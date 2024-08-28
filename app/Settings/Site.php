<?php

namespace App\Settings;

use App\Helpers\TranslatableSettings;
use Spatie\LaravelSettings\Settings;

class Site extends Settings
{
    private array $translatable = [
        'fav_icon', 'logo', 'logo_2', 'address'
    ];

    private array $uploads = [
        'fav_icon', 'logo', 'logo_2'
    ];

    public function translatable()
    {
        return $this->translatable;
    }

    public function uploads(){
        return $this->uploads;
    }

    use TranslatableSettings;

    public ?string $fav_icon;

    public ?array $logo;
    public ?array $logo_2;

    public ?string $email;
    public ?string $phone;

    public ?string $facebook_link;
    public ?string $instagram_link;
    public ?string $twitter_link;
    public ?string $youtube_link;
    public ?string $linkedin_link;
    public ?string $whatsapp_link;
    public ?string $app_store_link;
    public ?string $play_store_link;
    public ?string $app_gallery_link;

    public ?int $default_page_size;
    public ?int $news_page_size;
    public ?int $faqs_page_size;

    public ?string $contact_us_mailing_list;

    public ?string $captcha_secret_key;
    public ?string $captcha_site_key;
    public bool $enable_captcha;

    public static function group(): string
    {
        return 'site';
    }
}
