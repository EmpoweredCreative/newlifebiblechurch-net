/**
 * URL-safe path under /images (handles spaces and special characters in folder/file names).
 */
export function siteImage(relativePath) {
    return '/images/' + relativePath.split('/').map(encodeURIComponent).join('/');
}
