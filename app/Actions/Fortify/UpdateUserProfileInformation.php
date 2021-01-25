<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use JD\Cloudder\Facades\Cloudder;

// use Illuminate\Support\Facades\Cloudder;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed $user
     * @param  array $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make(
            $input,
            [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'user_phone' => ['required', 'digits:11'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'driverLicenseId' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
            ]
        )->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            if ($user->profile_photo_public_id) {
                Cloudder::destroyImage($user->profile_photo_public_id);
            }
            $photo = $input['photo'];
            $imagePath = $photo->getRealpath();
            Cloudder::upload($imagePath, null);
            $publicId = Cloudder::getPublicId();
            $imageUrl = Cloudder::show($publicId, [
                'width' => 300,
                'height' => 300,
            ]);
            $user->profile_photo_path = $imageUrl;
            $user->profile_photo_public_id = $publicId;
            // $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email
            && $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill(
                [
                'name' => $input['name'],
                'lastname' => $input['lastname'],
                'username' => $input['username'],
                'driverLicenseId' => $input['driverLicenseId'],
                'user_phone' => $input['user_phone'],
                'email' => $input['email'],
                ]
            )->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed $user
     * @param  array $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill(
            [
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'username' => $input['username'],
            'driverLicenseId' => $input['driverLicenseId'],
            'user_phone' => $input['user_phone'],
            'email' => $input['email'],
            'email_verified_at' => null,
            ]
        )->save();

        $user->sendEmailVerificationNotification();
    }
}
