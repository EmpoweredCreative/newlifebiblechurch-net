<?php

namespace App\Support;

class VideoEmbed
{
    /**
     * Return a URL suitable for an iframe src, or null if unsupported.
     */
    public static function toEmbedUrl(?string $url): ?string
    {
        if ($url === null || $url === '') {
            return null;
        }

        $url = trim($url);
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return null;
        }

        $parts = parse_url($url);
        if ($parts === false || empty($parts['host'])) {
            return null;
        }

        $host = strtolower($parts['host']);

        return match (true) {
            self::isYoutubeHost($host) => self::youtubeEmbed($parts),
            self::isVimeoHost($host) => self::vimeoEmbed($parts),
            default => null,
        };
    }

    /**
     * Static thumbnail for the video (YouTube official CDN; Vimeo via vumbnail.com).
     */
    public static function posterUrl(?string $url): ?string
    {
        if ($url === null || $url === '') {
            return null;
        }

        $url = trim($url);
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return null;
        }

        $parts = parse_url($url);
        if ($parts === false || empty($parts['host'])) {
            return null;
        }

        $host = strtolower($parts['host']);

        if (self::isYoutubeHost($host)) {
            $id = self::youtubeIdFromParsedParts($parts);

            return $id ? 'https://img.youtube.com/vi/'.$id.'/hqdefault.jpg' : null;
        }

        if (self::isVimeoHost($host)) {
            $id = self::vimeoIdFromParsedParts($parts);

            return $id ? 'https://vumbnail.com/'.$id.'.jpg' : null;
        }

        return null;
    }

    public static function isAllowedVideoUrl(string $url): bool
    {
        return self::toEmbedUrl($url) !== null;
    }

    private static function isYoutubeHost(string $host): bool
    {
        return $host === 'youtube.com'
            || $host === 'www.youtube.com'
            || $host === 'youtu.be'
            || $host === 'm.youtube.com';
    }

    private static function isVimeoHost(string $host): bool
    {
        return $host === 'vimeo.com'
            || $host === 'www.vimeo.com'
            || $host === 'player.vimeo.com';
    }

    /**
     * @param  array<string, mixed>  $parts
     */
    private static function youtubeEmbed(array $parts): ?string
    {
        $id = self::youtubeIdFromParsedParts($parts);

        return $id ? 'https://www.youtube.com/embed/'.$id : null;
    }

    /**
     * @param  array<string, mixed>  $parts
     */
    private static function youtubeIdFromParsedParts(array $parts): ?string
    {
        $host = strtolower((string) ($parts['host'] ?? ''));

        if ($host === 'youtu.be') {
            $id = isset($parts['path']) ? trim((string) $parts['path'], '/') : '';

            return self::youtubeIdValid($id) ? $id : null;
        }

        $path = (string) ($parts['path'] ?? '');
        if ($path === '/watch' || str_starts_with($path, '/watch')) {
            parse_str((string) ($parts['query'] ?? ''), $q);
            $id = $q['v'] ?? '';

            return self::youtubeIdValid($id) ? $id : null;
        }

        if (str_starts_with($path, '/embed/')) {
            $id = trim(substr($path, strlen('/embed/')), '/');

            return self::youtubeIdValid($id) ? $id : null;
        }

        if (str_starts_with($path, '/shorts/')) {
            $id = trim(substr($path, strlen('/shorts/')), '/');

            return self::youtubeIdValid($id) ? $id : null;
        }

        return null;
    }

    private static function youtubeIdValid(string $id): bool
    {
        return (bool) preg_match('/^[a-zA-Z0-9_-]{11}$/', $id);
    }

    /**
     * @param  array<string, mixed>  $parts
     */
    private static function vimeoEmbed(array $parts): ?string
    {
        $id = self::vimeoIdFromParsedParts($parts);

        return $id ? 'https://player.vimeo.com/video/'.$id : null;
    }

    /**
     * @param  array<string, mixed>  $parts
     */
    private static function vimeoIdFromParsedParts(array $parts): ?string
    {
        $host = strtolower((string) ($parts['host'] ?? ''));
        $path = trim((string) ($parts['path'] ?? '/'), '/');

        if ($host === 'player.vimeo.com' && str_starts_with($path, 'video/')) {
            $id = trim(substr($path, strlen('video/')), '/');

            return self::vimeoIdValid($id) ? $id : null;
        }

        if ($path !== '' && ! str_contains($path, '/')) {
            return self::vimeoIdValid($path) ? $path : null;
        }

        if (preg_match('#^(\d+)(?:/|$)#', $path, $m)) {
            return self::vimeoIdValid($m[1]) ? $m[1] : null;
        }

        return null;
    }

    private static function vimeoIdValid(string $id): bool
    {
        return (bool) preg_match('/^\d{6,15}$/', $id);
    }
}
