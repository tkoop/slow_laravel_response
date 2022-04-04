<?php

namespace App\Exceptions;

use Exception;

class NotFoundHttpException extends Exception {
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render() {
        return response([
            // for compatibility:
            "found" => false,
            "errorStringId" => $this->message,
        ], 404);
    }
}
