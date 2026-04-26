<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemDataSeeder extends Seeder
{
    public function run()
    {
        // Table: settings
        DB::table('settings')->updateOrInsert(['id' => 98], array (
  'id' => 98,
  'key' => 'home_notification',
  'value' => 'Chào mừng bạn đến với hệ thống dịch vụ MXH chuyên nghiệp!',
));
        DB::table('settings')->updateOrInsert(['id' => 99], array (
  'id' => 99,
  'key' => 'tsr_enabled',
  'value' => '0',
));
        DB::table('settings')->updateOrInsert(['id' => 100], array (
  'id' => 100,
  'key' => 'bank_name',
  'value' => 'Ngân hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV)',
));
        DB::table('settings')->updateOrInsert(['id' => 101], array (
  'id' => 101,
  'key' => 'bank_id',
  'value' => 'BIDV',
));
        DB::table('settings')->updateOrInsert(['id' => 102], array (
  'id' => 102,
  'key' => 'bank_account_no',
  'value' => '1222172532',
));
        DB::table('settings')->updateOrInsert(['id' => 103], array (
  'id' => 103,
  'key' => 'bank_account_name',
  'value' => 'DINH NGOC TOAN',
));
        DB::table('settings')->updateOrInsert(['id' => 104], array (
  'id' => 104,
  'key' => 'bank_description',
  'value' => 'NAP',
));

        // Table: categories
        DB::table('categories')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'categories',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 1,
    'type' => 'service',
    'icon' => 'ri-facebook-box-fill',
    'name' => 'Facebook',
    'slug' => 'facebook',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 1,
    'type' => 'service',
    'icon' => 'ri-facebook-box-fill',
    'name' => 'Facebook',
    'slug' => 'facebook',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'type',
    1 => 'icon',
    2 => 'name',
    3 => 'slug',
    4 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('categories')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'categories',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 2,
    'type' => 'service',
    'icon' => 'ri-tiktok-fill',
    'name' => 'TikTok',
    'slug' => 'tiktok',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 2,
    'type' => 'service',
    'icon' => 'ri-tiktok-fill',
    'name' => 'TikTok',
    'slug' => 'tiktok',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'type',
    1 => 'icon',
    2 => 'name',
    3 => 'slug',
    4 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('categories')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'categories',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 3,
    'type' => 'service',
    'icon' => 'ri-instagram-fill',
    'name' => 'Instagram',
    'slug' => 'instagram',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 3,
    'type' => 'service',
    'icon' => 'ri-instagram-fill',
    'name' => 'Instagram',
    'slug' => 'instagram',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'type',
    1 => 'icon',
    2 => 'name',
    3 => 'slug',
    4 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('categories')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'categories',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 4,
    'type' => 'service',
    'icon' => 'ri-youtube-fill',
    'name' => 'Youtube',
    'slug' => 'youtube',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 4,
    'type' => 'service',
    'icon' => 'ri-youtube-fill',
    'name' => 'Youtube',
    'slug' => 'youtube',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'type',
    1 => 'icon',
    2 => 'name',
    3 => 'slug',
    4 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('categories')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'categories',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 5,
    'type' => 'service',
    'icon' => 'ri-google-fill',
    'name' => 'Dịch vụ Google',
    'slug' => 'dich-vu-google',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 5,
    'type' => 'service',
    'icon' => 'ri-google-fill',
    'name' => 'Dịch vụ Google',
    'slug' => 'dich-vu-google',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'type',
    1 => 'icon',
    2 => 'name',
    3 => 'slug',
    4 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));

        // Table: services
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 1,
    'category_id' => 1,
    'name' => 'Like Bài Viết',
    'slug' => 'like-bai-viet',
    'description' => NULL,
    'label' => 'Link bài viết',
    'placeholder' => 'https://www.facebook.com/username/posts/123456789',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 1,
    'category_id' => 1,
    'name' => 'Like Bài Viết',
    'slug' => 'like-bai-viet',
    'description' => NULL,
    'label' => 'Link bài viết',
    'placeholder' => 'https://www.facebook.com/username/posts/123456789',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 2,
    'category_id' => 1,
    'name' => 'Follow Cá Nhân',
    'slug' => 'follow-ca-nhan',
    'description' => NULL,
    'label' => 'Link trang cá nhân',
    'placeholder' => 'https://www.facebook.com/username',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 2,
    'category_id' => 1,
    'name' => 'Follow Cá Nhân',
    'slug' => 'follow-ca-nhan',
    'description' => NULL,
    'label' => 'Link trang cá nhân',
    'placeholder' => 'https://www.facebook.com/username',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 3,
    'category_id' => 2,
    'name' => 'Tim TikTok',
    'slug' => 'tim-tiktok',
    'description' => NULL,
    'label' => 'Link video TikTok',
    'placeholder' => 'https://www.tiktok.com/@username/video/123456789',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 3,
    'category_id' => 2,
    'name' => 'Tim TikTok',
    'slug' => 'tim-tiktok',
    'description' => NULL,
    'label' => 'Link video TikTok',
    'placeholder' => 'https://www.tiktok.com/@username/video/123456789',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 4,
    'category_id' => 2,
    'name' => 'Follow TikTok',
    'slug' => 'follow-tiktok',
    'description' => NULL,
    'label' => 'Link profile TikTok',
    'placeholder' => 'https://www.tiktok.com/@username',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 4,
    'category_id' => 2,
    'name' => 'Follow TikTok',
    'slug' => 'follow-tiktok',
    'description' => NULL,
    'label' => 'Link profile TikTok',
    'placeholder' => 'https://www.tiktok.com/@username',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 5,
    'category_id' => 3,
    'name' => 'Like Instagram',
    'slug' => 'like-instagram',
    'description' => NULL,
    'label' => 'Link ảnh/video',
    'placeholder' => 'https://www.instagram.com/p/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 5,
    'category_id' => 3,
    'name' => 'Like Instagram',
    'slug' => 'like-instagram',
    'description' => NULL,
    'label' => 'Link ảnh/video',
    'placeholder' => 'https://www.instagram.com/p/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 6,
    'category_id' => 4,
    'name' => 'View Youtube',
    'slug' => 'view-youtube',
    'description' => NULL,
    'label' => 'Link video Youtube',
    'placeholder' => 'https://www.youtube.com/watch?v=abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 6,
    'category_id' => 4,
    'name' => 'View Youtube',
    'slug' => 'view-youtube',
    'description' => NULL,
    'label' => 'Link video Youtube',
    'placeholder' => 'https://www.youtube.com/watch?v=abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 7,
    'category_id' => 4,
    'name' => 'Sub Youtube',
    'slug' => 'sub-youtube',
    'description' => NULL,
    'label' => 'Link kênh Youtube',
    'placeholder' => 'https://www.youtube.com/channel/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 7,
    'category_id' => 4,
    'name' => 'Sub Youtube',
    'slug' => 'sub-youtube',
    'description' => NULL,
    'label' => 'Link kênh Youtube',
    'placeholder' => 'https://www.youtube.com/channel/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('services')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'services',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 8,
    'category_id' => 5,
    'name' => 'Đánh giá Google Map',
    'slug' => 'danh-gia-google-map',
    'description' => NULL,
    'label' => 'Link địa điểm Map',
    'placeholder' => 'https://goo.gl/maps/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 8,
    'category_id' => 5,
    'name' => 'Đánh giá Google Map',
    'slug' => 'danh-gia-google-map',
    'description' => NULL,
    'label' => 'Link địa điểm Map',
    'placeholder' => 'https://goo.gl/maps/abcxyz',
    'status' => '1',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'category_id',
    1 => 'name',
    2 => 'slug',
    3 => 'label',
    4 => 'placeholder',
    5 => 'description',
    6 => 'status',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));

        // Table: packages
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 1,
    'service_id' => 1,
    'name' => 'Like Việt (Lên nhanh)',
    'price' => 15,
    'price_vip' => 12.0,
    'price_collaborator' => 10.0,
    'min_quantity' => 100,
    'max_quantity' => 50000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 1,
    'service_id' => 1,
    'name' => 'Like Việt (Lên nhanh)',
    'price' => 15,
    'price_vip' => 12.0,
    'price_collaborator' => 10.0,
    'min_quantity' => 100,
    'max_quantity' => 50000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 2,
    'service_id' => 1,
    'name' => 'Like Việt (Giá rẻ)',
    'price' => 8,
    'price_vip' => 6.0,
    'price_collaborator' => 5.0,
    'min_quantity' => 100,
    'max_quantity' => 20000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 2,
    'service_id' => 1,
    'name' => 'Like Việt (Giá rẻ)',
    'price' => 8,
    'price_vip' => 6.0,
    'price_collaborator' => 5.0,
    'min_quantity' => 100,
    'max_quantity' => 20000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 3,
    'service_id' => 2,
    'name' => 'Follow Nick Thật',
    'price' => 45,
    'price_vip' => 40.0,
    'price_collaborator' => 35.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 3,
    'service_id' => 2,
    'name' => 'Follow Nick Thật',
    'price' => 45,
    'price_vip' => 40.0,
    'price_collaborator' => 35.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 4,
    'service_id' => 2,
    'name' => 'Follow Giá Rẻ',
    'price' => 25,
    'price_vip' => 20.0,
    'price_collaborator' => 18.0,
    'min_quantity' => 100,
    'max_quantity' => 50000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 4,
    'service_id' => 2,
    'name' => 'Follow Giá Rẻ',
    'price' => 25,
    'price_vip' => 20.0,
    'price_collaborator' => 18.0,
    'min_quantity' => 100,
    'max_quantity' => 50000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 5,
    'service_id' => 3,
    'name' => 'Tim Lên Nhanh',
    'price' => 10,
    'price_vip' => 8.0,
    'price_collaborator' => 7.0,
    'min_quantity' => 100,
    'max_quantity' => 1000000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 5,
    'service_id' => 3,
    'name' => 'Tim Lên Nhanh',
    'price' => 10,
    'price_vip' => 8.0,
    'price_collaborator' => 7.0,
    'min_quantity' => 100,
    'max_quantity' => 1000000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 6,
    'service_id' => 4,
    'name' => 'Follow Việt',
    'price' => 60,
    'price_vip' => 55.0,
    'price_collaborator' => 50.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 6,
    'service_id' => 4,
    'name' => 'Follow Việt',
    'price' => 60,
    'price_vip' => 55.0,
    'price_collaborator' => 50.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 7,
    'service_id' => 5,
    'name' => 'Like Global',
    'price' => 5,
    'price_vip' => 4.0,
    'price_collaborator' => 3.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 7,
    'service_id' => 5,
    'name' => 'Like Global',
    'price' => 5,
    'price_vip' => 4.0,
    'price_collaborator' => 3.0,
    'min_quantity' => 100,
    'max_quantity' => 100000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 8,
    'service_id' => 6,
    'name' => 'View 4000h Giờ Xem',
    'price' => 150,
    'price_vip' => 140.0,
    'price_collaborator' => 130.0,
    'min_quantity' => 1000,
    'max_quantity' => 4000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 8,
    'service_id' => 6,
    'name' => 'View 4000h Giờ Xem',
    'price' => 150,
    'price_vip' => 140.0,
    'price_collaborator' => 130.0,
    'min_quantity' => 1000,
    'max_quantity' => 4000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 9,
    'service_id' => 6,
    'name' => 'View Thường',
    'price' => 40,
    'price_vip' => 35.0,
    'price_collaborator' => 30.0,
    'min_quantity' => 1000,
    'max_quantity' => 1000000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 9,
    'service_id' => 6,
    'name' => 'View Thường',
    'price' => 40,
    'price_vip' => 35.0,
    'price_collaborator' => 30.0,
    'min_quantity' => 1000,
    'max_quantity' => 1000000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '101',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 10,
    'service_id' => 7,
    'name' => 'Sub Real',
    'price' => 500,
    'price_vip' => 450.0,
    'price_collaborator' => 400.0,
    'min_quantity' => 100,
    'max_quantity' => 10000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 10,
    'service_id' => 7,
    'name' => 'Sub Real',
    'price' => 500,
    'price_vip' => 450.0,
    'price_collaborator' => 400.0,
    'min_quantity' => 100,
    'max_quantity' => 10000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));
        DB::table('packages')->updateOrInsert(['id' => null], array (
  '' . "\0" . '*' . "\0" . 'connection' => 'mysql',
  '' . "\0" . '*' . "\0" . 'table' => 'packages',
  '' . "\0" . '*' . "\0" . 'primaryKey' => 'id',
  '' . "\0" . '*' . "\0" . 'keyType' => 'int',
  'incrementing' => true,
  '' . "\0" . '*' . "\0" . 'with' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'withCount' => 
  array (
  ),
  'preventsLazyLoading' => false,
  '' . "\0" . '*' . "\0" . 'perPage' => 15,
  'exists' => true,
  'wasRecentlyCreated' => false,
  '' . "\0" . '*' . "\0" . 'escapeWhenCastingToString' => false,
  '' . "\0" . '*' . "\0" . 'attributes' => 
  array (
    'id' => 11,
    'service_id' => 8,
    'name' => 'Review 5 Sao Kèm Nội Dung',
    'price' => 5000,
    'price_vip' => 4500.0,
    'price_collaborator' => 4000.0,
    'min_quantity' => 10,
    'max_quantity' => 1000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'original' => 
  array (
    'id' => 11,
    'service_id' => 8,
    'name' => 'Review 5 Sao Kèm Nội Dung',
    'price' => 5000,
    'price_vip' => 4500.0,
    'price_collaborator' => 4000.0,
    'min_quantity' => 10,
    'max_quantity' => 1000,
    'note' => 'Dịch vụ ổn định, bảo hành 30 ngày.',
    'status' => '1',
    'provider' => 'trumsub',
    'api_service_id' => '100',
    'created_at' => '2026-04-26 09:52:37',
    'updated_at' => '2026-04-26 09:52:37',
  ),
  '' . "\0" . '*' . "\0" . 'changes' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'casts' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'classCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'attributeCastCache' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dates' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dateFormat' => NULL,
  '' . "\0" . '*' . "\0" . 'appends' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'dispatchesEvents' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'observables' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'relations' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'touches' => 
  array (
  ),
  'timestamps' => true,
  '' . "\0" . '*' . "\0" . 'hidden' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'visible' => 
  array (
  ),
  '' . "\0" . '*' . "\0" . 'fillable' => 
  array (
    0 => 'service_id',
    1 => 'name',
    2 => 'price',
    3 => 'price_vip',
    4 => 'price_collaborator',
    5 => 'min_quantity',
    6 => 'max_quantity',
    7 => 'note',
    8 => 'status',
    9 => 'provider',
    10 => 'api_service_id',
  ),
  '' . "\0" . '*' . "\0" . 'guarded' => 
  array (
    0 => '*',
  ),
));

    }
}
