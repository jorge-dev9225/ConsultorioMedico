use Illuminate\Auth\AuthenticationException;

public function render($request, Throwable $exception)
{
    if ($exception instanceof AuthenticationException) {
        return response()->json(['message' => 'No autenticado'], 401);
    }

    return parent::render($request, $exception);
}
