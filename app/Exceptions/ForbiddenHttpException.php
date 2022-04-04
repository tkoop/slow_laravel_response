<?php

namespace App\Exceptions;

use Exception;

class ForbiddenHttpException extends Exception {
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render() {
        return response([
            // for compatibility:
            "success" => false,
            "errorStringId" => $this->message,
        ], 403);
    }
}
