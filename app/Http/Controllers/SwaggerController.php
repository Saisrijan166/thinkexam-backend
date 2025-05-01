<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *      title="API documentation",
 *      version="1.0.0",
 *      description="API documentation for Laravel + React project"
 * )
 *
 * @OA\SecurityScheme(
 *      securityScheme="sanctum",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT"
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 * @OA\Tag(
 *     name="Login",
 *     description="APIs related to reports"
 * )
 * 
 * @OA\Tag(
 *     name="Profile",
 *     description="APIs related to reports"
 * )
 * 
 * @OA\Tag(
 *     name="Dashboard",
 *     description="APIs related to Dashboard"
 * )
 *
 * @OA\Tag(
 *     name="Tests",
 *     description="APIs related to Tests"
 * )
 * 
 * @OA\Tag(
 *     name="Candidates",
 *     description="APIs related to Candidates"
 * )
 * 
 * @OA\Tag(
 *     name="CandidateTable",
 *     description="APIs related to Candidtaes Table"
 * )
 * 
 * @OA\Tag(
 *     name="CBT",
 *     description="APIs related to Events"
 * )
 * 
 * @OA\Tag(
 *     name="Reports",
 *     description="APIs related to reports"
 * )
 * 
 */
class SwaggerController extends Controller
{
  // This controller is only for Swagger documentation purposes
}
