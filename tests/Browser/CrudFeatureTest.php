<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CrudFeatureTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user dummy
        User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);
    }

    /** @test */
    public function user_can_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Masuk') // ubah sesuai teks tombol di login.blade.php
                ->type('email', 'admin@test.com')
                ->type('password', 'password')
                ->press('Masuk')
                ->waitForLocation('/home')
                ->assertPathIs('/home')
                ->screenshot('01_login_sukses');
        });
    }

    /** @test */
    public function user_can_create_story()
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();

            $browser->loginAs($user)
                ->visit('/stories/create')
                ->type('title', 'Cerita Dusk Test')
                ->type('description', 'Ini sinopsis otomatis oleh Laravel Dusk.')
                ->attach('cover', base_path('tests/Browser/test-image.jpg'))
                ->press('Simpan Cerita')
                ->assertSee('Berhasil') // atau teks lain yang muncul
                ->screenshot('02_create_sukses');
        });
    }

    /** @test */
    public function user_can_read_story()
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();

            $browser->loginAs($user)
                ->visit('/stories')
                ->assertSee('Cerita Dusk Test')
                ->screenshot('03_read_sukses');
        });
    }

    /** @test */
    public function user_can_update_story()
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();

            $browser->loginAs($user)
                ->visit('/stories')
                ->clickLink('Edit') // pastikan tombolnya bernama "Edit"
                ->clear('title')
                ->type('title', 'Cerita Diperbarui oleh Dusk')
                ->press('Simpan')
                ->assertSee('Berhasil')
                ->screenshot('04_update_sukses');
        });
    }

    /** @test */
    public function user_can_delete_story()
    {
        $this->browse(function (Browser $browser) {
            $user = User::first();

            $browser->loginAs($user)
                ->visit('/stories')
                ->press('Hapus') // pastikan tombolnya "Hapus"
                ->assertDontSee('Cerita Diperbarui oleh Dusk')
                ->screenshot('05_delete_sukses');
        });
    }
}
