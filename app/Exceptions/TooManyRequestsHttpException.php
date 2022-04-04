<?php

namespace App\Exceptions;

use Exception;

class TooManyRequestsHttpException extends Exception {
    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render() {
        return response([
            "errorStringId" => $this->message,
        ], 409);
    }
}
