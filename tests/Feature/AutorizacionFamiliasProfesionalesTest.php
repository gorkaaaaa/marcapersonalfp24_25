<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\FamiliaProfesional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;

class AutorizacionFamiliasProfesionalesTest extends TestCase
{
    // use RefreshDatabase;

    private static $apiurl_familia = '/api/v1/familias_profesionales';

    public function familiaIndex() : TestResponse
    {
        return $this->get(self::$apiurl_familia);
    }

    public function familiaShow() : TestResponse
    {
        $familia = FamiliaProfesional::inRandomOrder()->first();
        return $this->get(self::$apiurl_familia . "/{$familia->id}");
    }

    public function familiaStore($admin = false) : TestResponse
    {
        $familia = $admin
        ? FamiliaProfesional::create(['codigo' => 'ABC', 'nombre'=>'ejemplo'])
            : FamiliaProfesional::inRandomOrder()->first();
        $data = [
            'codigo' => 'BCA',
            'nombre' => 'ejemplo'
        ];
        return $this->postJson(self::$apiurl_familia, $data);
    }

    public function familiaUpdate($admin = false) : TestResponse
    {
        $familia = $admin
        ? FamiliaProfesional::create(['codigo' => 'ABC', 'nombre'=>'ejemplo'])
            : FamiliaProfesional::inRandomOrder()->first();
        $data = [
            'codigo' => 'BCA',
            'nombre' => 'ejemplo'
        ];
        return $this->putJson(self::$apiurl_familia . "/{$familia->id}", $data);
    }

    public function familiaDelete($admin = false) : TestResponse
    {
        $familia = $admin
            ? FamiliaProfesional::create(['codigo' => 'ABC', 'nombre'=>'ejemplo'])
            : FamiliaProfesional::inRandomOrder()->first();
        return $this->delete(self::$apiurl_familia . "/{$familia->id}");
    }

    public function test_anonymous_can_access_familia_profesional_list_and_view()
    {
        $this->assertGuest();

        $response = $this->familiaIndex();
        $response->assertStatus(200);

        $response = $this->familiaShow();
        $response->assertStatus(200);

        $response = $this->familiaStore();
        $response->assertUnauthorized();

        $response = $this->familiaUpdate();
        $response->assertUnauthorized();

        $response = $this->familiaDelete();
        $response->assertFound();

    }

    public function test_admin_can_CRUD_familia()
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))->first();
        $this->actingAs($admin);

        $response = $this->familiaIndex();
        $response->assertSuccessful();

        $response = $this->familiaShow();
        $response->assertSuccessful();

        $response = $this->familiaStore($admin = true);
        $response->assertSuccessful();

        $response = $this->familiaUpdate($admin = true);
        $response->assertSuccessful();

         $response = $this->familiaDelete($admin = true);
         $response->assertSuccessful();
    }

}
