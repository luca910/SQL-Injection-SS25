<?php
/**
 * Sends a JSON response with the provided HTTP status code.
 *
 * This function takes an HTTP status code as an argument, maps it to a predefined message,
 * sets the HTTP response code, and sends a JSON response with the code and message.
 * It then terminates the script execution.
 *
 * @param int $code The HTTP status code to send.
 * @param String|null $msg The custom message to send.
 * @return void
 *
 * @example response(200); // Sends a 200 OK response.
 * @example response(404); // Sends a 404 Not Found response.
 * @example response(500); // Sends a 500 Internal Server Error response.
 * @example response(403); // Sends a 403 Forbidden response.
 * @example response(401); // Sends a 401 Unauthorized response.
 * @example response(201); // Sends a 201 Created response.
 * @example response(204); // Sends a 204 No Content response.
 * @example response(405); // Sends a 405 Method Not Allowed response.
 * @example response(400); // Sends a 400 Bad Request response.
 * @example response(401); // Sends a 401 Unauthorized response.
 * @example response(500); // Sends a 500 Internal Server Error response.
 *
 * @category Response
 * @package  None
 * @since    1.0
 * @author   Luca Krawczyk
 */
function response(int $code , String $msg = null) {
    // Map of HTTP status codes to messages.
    $codes = [
        200 => "OK",
        201 => "Created",
        204 => "No Content",
        400 => "Bad Request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "Not Found",
        405 => "Method Not Allowed",
        500 => "Internal Server Error"
    ];

    // Set the HTTP response code.
    http_response_code($code);

    // Create the response array with the code and message.
    $response = array('code' => $code, 'message' => $codes[$code], 'custom' => $msg);



    // Send the response as JSON.
    echo json_encode($response);

    // Terminate the script execution.
    exit();
}