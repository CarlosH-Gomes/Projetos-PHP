<?php

use App\Locador;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class LocadorSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Locador $registro)
    {
        factory(Locador::class,50)->create();
        
        /*$registro->create([
                'nome' =>'Carlos Henrique Gomes',
                'CPF' => '132231313',
                'RG' => '213213213',
                'Data_Nasci' => Carbon::createFromFormat('d/m/Y', '04/04/1998')->format('Y-m-d'),
                'Telefone' => '93213131',
                'email' => 'carlos@hotmail.com',
        ]);*/
    }
}
