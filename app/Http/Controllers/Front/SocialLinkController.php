<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialLinkCreateRequest;
use App\Http\Services\ImageService;
use App\Http\Services\SocialLinkService;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SocialLinkController extends Controller
{
    use Loggable;
    public function __construct(readonly SocialLinkService $socialLinkService){}

    public function store(SocialLinkCreateRequest $request)
    {
        $data = $request->only("facebook", "twitter", "linkedin", "whatsapp", "instagram", "youtube");
        $user = Auth::user()->load("company.socialLinks", "candidate.socialLinks");

        try {
            $create = $this->socialLinkService
                ->setUser($user)
                ->create($data);

            if (!$create) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "SocialLinkController@create");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
