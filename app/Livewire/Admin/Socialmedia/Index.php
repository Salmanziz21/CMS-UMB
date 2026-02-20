<?php

namespace App\Livewire\Admin\Socialmedia;

use App\Models\Studyprogram;
use App\Models\Socialmedia;
use Livewire\Component;

class Index extends Component
{
    protected string $pageTitle = 'Link Media Sosial';

    public $socialmedias = [];
    public $instagram_name;
    public $instagram_url;
    public $facebook_name;
    public $facebook_url;
    public $twitter_name;
    public $twitter_url;
    public $youtube_name;
    public $youtube_url;
    public $whatsapp_name;
    public $whatsapp_url;
    
    public function mount()
    {
        $this->loadSocialMedia();
    }

    public function loadSocialMedia()
    {
        $this->socialmedias = Socialmedia::all();
        
        $instagram = $this->socialmedias->firstWhere('name_app', 'Instagram');
        $facebook = $this->socialmedias->firstWhere('name_app', 'Facebook');
        $twitter = $this->socialmedias->firstWhere('name_app', 'X (Twitter)');
        $youtube = $this->socialmedias->firstWhere('name_app', 'YouTube');
        $whatsapp = $this->socialmedias->firstWhere('name_app', 'WhatsApp');


        $this->instagram_name = $instagram?->name ?? 'Instagram';
        $this->instagram_url = $instagram?->url ?? '';
        $this->facebook_name = $facebook?->name ?? 'Facebook';
        $this->facebook_url = $facebook?->url ?? '';
        $this->twitter_name = $twitter?->name ?? 'X (Twitter)';
        $this->twitter_url = $twitter?->url ?? '';
        $this->youtube_name = $youtube?->name ?? 'YouTube';
        $this->youtube_url = $youtube?->url ?? '';
        $this->whatsapp_name = $whatsapp?->name ?? 'WhatsApp';
        $this->whatsapp_url = $whatsapp?->url ?? '';
    }

    public function update()
    {
        $this->validate([
            'instagram_name' => 'required|string|max:255',
            'instagram_url' => 'required|url|max:255',
            'facebook_name' => 'required|string|max:255',
            'facebook_url' => 'required|url|max:255',
            'twitter_name' => 'required|string|max:255',
            'twitter_url' => 'required|url|max:255',
            'youtube_name' => 'required|string|max:255',
            'youtube_url' => 'required|url|max:255',
            'whatsapp_name' => 'required|string|max:255',
            'whatsapp_url' => 'required|url|max:255',
        ]);

        $socialMediaConfigs = [
            ['name' => $this->instagram_name, 'name_app' => 'Instagram', 'url' => $this->instagram_url],
            ['name' => $this->facebook_name, 'name_app' => 'Facebook', 'url' => $this->facebook_url],
            ['name' => $this->twitter_name, 'name_app' => 'X (Twitter)', 'url' => $this->twitter_url],
            ['name' => $this->youtube_name, 'name_app' => 'YouTube', 'url' => $this->youtube_url],
            ['name' => $this->whatsapp_name, 'name_app' => 'WhatsApp', 'url' => $this->whatsapp_url],
        ];

        $studyprogram = Studyprogram::first();
        if (!$studyprogram) {
            session()->flash('error', 'Silakan isi data Program Studi terlebih dahulu.');
            return;
        }

        foreach ($socialMediaConfigs as $config) {
            $socialmedia = Socialmedia::where('name_app', $config['name_app'])->first();
            if ($socialmedia) {
                $socialmedia->update($config);
            } else {
                Socialmedia::create(array_merge($config, ['studyprogram_id' => $studyprogram->id]));
            }
        }

        $this->loadSocialMedia();
        session()->flash('message', 'Data berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.admin.socialmedia.index')
            ->layout('components.layouts.app', [
                'title' => $this->pageTitle,
            ]);
    }
}
