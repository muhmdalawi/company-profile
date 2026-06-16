<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    use HandlesImageUploads;

    public function edit()
    {
        $profile = CompanyProfile::firstOrCreate([], $this->defaultProfileData());

        return view('admin.company-profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::firstOrCreate([], $this->defaultProfileData());

        $data = $request->validate([
            'company_name' => ['required', 'min:3'],
            'main_title' => ['required', 'min:3'],
            'main_description' => ['required'],
            'who_we_are_title' => ['nullable', 'min:3'],
            'who_we_are_description' => ['nullable'],
            'footer_description' => ['nullable'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable'],
            'address' => ['nullable'],
            'website' => ['nullable', 'url'],
            'facebook_url' => ['nullable'],
            'instagram_url' => ['nullable'],
            'linkedin_url' => ['nullable'],
            'twitter_url' => ['nullable'],
            'map_embed_url' => ['nullable'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $data['logo'] = $this->uploadImage($request, 'logo', 'company', $profile->logo);
        $profile->update($data);

        return redirect()->route('admin.company-profile.edit')->with('success', 'Company profile berhasil diperbarui.');
    }

    private function defaultProfileData(): array
    {
        return [
            'company_name' => 'Nigmagrid Indonesia',
            'logo' => 'images/logo_nigma.png',
            'main_title' => 'About Nigmagrid',
            'main_description' => 'Nigmagrid Indonesia adalah perusahaan teknologi yang berfokus pada penyediaan solusi digital terintegrasi untuk mendukung transformasi bisnis di era modern.',
            'who_we_are_title' => 'Who We Are',
            'who_we_are_description' => 'Kami berfokus pada pengembangan solusi seperti ERP, CRM, dan Cloud yang membantu perusahaan meningkatkan efisiensi operasional dan pengambilan keputusan berbasis data.',
            'footer_description' => 'Solusi digital kreatif untuk membantu bisnis berkembang di era modern.',
            'email' => 'info@nigmagrid.com',
            'phone' => '+62 812-3456-7890',
            'address' => 'Indonesia',
        ];
    }
}
