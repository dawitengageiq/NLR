<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Advertiser::class, function (Faker\Generator $faker) {
    return [
        'company' => $faker->company,
        'website_url' => $faker->url,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => 'CA',
        'zip' => '900011',
        'description' => $faker->sentence,
        'status' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(App\Affiliate::class, function (Faker\Generator $faker) {
    return [
        'company' => $faker->company,
        'website_url' => $faker->url,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => 'CA',
        'zip' => '90001',
        'description' => $faker->sentence,
        'status' => $faker->numberBetween(0, 1),
    ];
});

$factory->define(App\Campaign::class, function (Faker\Generator $faker) {

    $advertisers = \App\Advertiser::lists('id')->toArray();
    $campaign_types = config('constants.CAMPAIGN_TYPES');
    $campaign_types = array_keys($campaign_types);
    $campaign_count = \App\Campaign::count();
    $new_campaign_priority = $campaign_count + 1;

    return [
        'name' => 'Campaign-'.$faker->numberBetween(1, 1000),
        'advertiser_id' => $faker->randomElement($advertisers),
        'status' => $faker->numberBetween(0, 2),
        'description' => $faker->sentence(),
        'lead_cap_type' => $faker->numberBetween(1, 3),
        'lead_cap_value' => $faker->numberBetween(0, 10000),
        'priority' => $new_campaign_priority,
        'campaign_type' => $faker->randomElement($campaign_types),
        'default_received' => 2.50,
        'default_payout' => 1,
    ];
});

$factory->define(App\Lead::class, function (Faker\Generator $faker) {

    //$campaigns = App\Campaign::whereIn('campaign_type',[4,255,32,209,208,139,247,92,129,83,210,20,23,5,168,147,200,186,101,90,169,206,265,213,135,6,134,192,292,266,279,264,38,259,220,33,28,159,40,19,199,46,296,112,189,22,47,128,239,240,276,277,278,291,254,122,256,232,126,251,175,80,27,253,35,182,120,119,153,82,152,29,109,234,233,102,149,103,219,174,167,217,180,214,154,173,183,177,142,138,121,117,132,113,155,156,133,79,166,110,111,18,137,36,91,44,78,45,43,11,87,181,165,260,295,299,300])->lists('id')->toArray();
    //$campaigns = [4,255,32,209,208,139,247,92,129,83,210,20,23,5,168,147,200,186,101,90,169,206,265,213,135,6,134,192,292,266,279,264,38,259,220,33,28,159,40,19,199,46,296,112,189,22,47,128,239,240,276,277,278,291,254,122,256,232,126,251,175,80,27,253,35,182,120,119,153,82,152,29,109,234,233,102,149,103,219,174,167,217,180,214,154,173,183,177,142,138,121,117,132,113,155,156,133,79,166,110,111,18,137,36,91,44,78,45,43,11,87,181,165,260,295,299,300];
    // $campaigns = App\Campaign::where('status','=',1)->lists('id')->toArray();
    $campaigns = [32, 65];
    // $campaigns = App\Campaign::lists('id')->toArray();
    //$affiliates = App\Affiliate::where('type','=',2)->lists('id')->toArray();
    //$affiliates = App\AffiliateRevenueTracker::lists('revenue_tracker_id')->toArray();
    //$affiliates = App\AffiliateRevenueTracker::where('offer_id',1)->lists('revenue_tracker_id')->toArray();
    //$affiliates = App\AffiliateRevenueTracker::where('offer_id', '!=', 1)->lists('revenue_tracker_id')->toArray();
    $affiliates = [1, 7612, 7820, 8245, 7819, 8094, 8093, 7789, 8095, 8128];

    /*
    $affiliates = App\AffiliateRevenueTracker::where('offer_id', '=',1)
                                                ->where('campaign_id','=',1)
                                                ->where('revenue_tracker_id','=',1)
                                                ->lists('revenue_tracker_id')->toArray();
    */

    $campaignID = $faker->randomElement($campaigns);
    $affiliateID = $faker->randomElement($affiliates);
    //$affiliateID = 2;
    $campaignPayout = App\CampaignPayout::getCampaignAffiliatePayout($campaignID, $affiliateID)->first();

    $subs = ['abc', 'def'];

    $payout = $faker->numberBetween(1.00, 2.00);
    $received = $faker->numberBetween(3.00, 6.00);

    if (isset($campaignPayout->payout)) {
        $payout = $campaignPayout->payout;
    }

    if (isset($campaignPayout->received)) {
        $received = $campaignPayout->received;
    }

    $dateStr = Carbon\Carbon::now()->subDays(30)->toDateTimeString();
    //$dateStr = \Carbon\Carbon::now()->subDays(1)->toDateTimeString();
    // $dateStr = Carbon\Carbon::parse('2017-10-01')->toDateTimeString();

    return [
        'campaign_id' => $campaignID,
        'affiliate_id' => $affiliateID,
        's1' => $faker->randomElement($subs),
        's2' => $faker->randomElement($subs),
        's3' => $faker->randomElement($subs),
        's4' => $faker->randomElement($subs),
        's5' => $faker->randomElement($subs),
        'lead_status' => 6,
        //'lead_status' => 1,
        'lead_email' => $faker->email,
        'retry_count' => 0,
        'payout' => $payout,
        'received' => $received,
        //'last_retry_date' => $faker->dateTimeBetween('2016-07-28','2016-08-04'),
        'last_retry_date' => $dateStr,
        'created_at' => $dateStr,
        'updated_at' => $dateStr,
    ];
});

$factory->define(App\LeadUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName(null),
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = '-13 years'),
        'gender' => 'M',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'address1' => $faker->address,
        'address2' => $faker->address,
        'ethnicity' => $faker->numberBetween(1, 6),
        'phone' => $faker->phoneNumber,
        'source_url' => $faker->url,
        'affiliate_id' => 1,
        'revenue_tracker_id' => 1,
        's1' => $faker->randomElement([1, 2, 3, 4, 5]),
        's2' => $faker->randomElement([1, 2, 3, 4, 5]),
        's3' => $faker->randomElement([1, 2, 3, 4, 5]),
        's4' => $faker->randomElement([1, 2, 3, 4, 5]),
        's5' => $faker->randomElement([1, 2, 3, 4, 5]),
    ];
});

$factory->define(App\AffiliateWebsite::class, function (Faker\Generator $faker) {

    return [
        'affiliate_id' => 7750,
        'website_name' => $faker->url,
        'website_description' => $faker->sentence,
        'payout' => $faker->randomFloat(3, 1, 30),
    ];
});

$factory->define(App\WebsitesViewTracker::class, function (Faker\Generator $faker) {

    $affiliateWebsites = App\AffiliateWebsite::whereIn('affiliate_id', [1, 2, 3, 3432])->lists('id')->toArray();

    //$dateStr = Carbon\Carbon::now()->subDay()->toDateTimeString();
    $dateStr = '2017-10-01';

    return [
        'website_id' => $faker->randomElement($affiliateWebsites),
        'email' => $faker->email,
        'payout' => $faker->randomFloat(3, 1, 30),
        'created_at' => $dateStr,
        'updated_at' => $dateStr,
    ];
});

$factory->define(App\WebsitesViewTracker::class, function (Faker\Generator $faker) {

    $affiliateWebsites = App\AffiliateWebsite::whereIn('affiliate_id', [1, 2, 3, 3432])->lists('id')->toArray();

    //$dateStr = Carbon\Carbon::now()->subDay()->toDateTimeString();
    $dateStr = '2017-10-01';

    return [
        'website_id' => $faker->randomElement($affiliateWebsites),
        'email' => $faker->email,
        'payout' => $faker->randomFloat(3, 1, 30),
        'created_at' => $dateStr,
        'updated_at' => $dateStr,
    ];
});

$factory->define(App\ClicksVsRegistrationStatistics::class, function (Faker\Generator $faker) {

    $registrationCount = $faker->numberBetween(0, 5000);
    $clicks = $registrationCount + $faker->numberBetween(0, 100);

    return [
        'registration_count' => $registrationCount,
        'clicks' => $clicks,
        'percentage' => floatval($registrationCount / $clicks),
    ];
});
