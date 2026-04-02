Someone requested an account on the New Life Bible Church website.

Name: {{ $user->name }}
Email: {{ $user->email }}
Requested at: {{ $user->created_at?->timezone(config('app.timezone'))->toDateTimeString() }}

Approve this registration (signed link; expires automatically):
{{ $approveUrl }}

Decline and remove this pending account:
{{ $rejectUrl }}

If you did not expect this message, you can ignore it or use Decline to delete the pending registration.
