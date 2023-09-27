<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder {
    public function run(){
        $data = [
            [
                'name' => 'Free',
                'description' => 'Free tier subscription plan for business owners',
                'price' => '0',
                'features' => 'Réservations par mois,Plugins supplémentaires,Liens supprimés de l’iframe,HIPAA plugin allowed,Solde des tickets,SAML/SSO,Application marque client activée,Notifications de l’application,Application client activée',
                'frequency' => 'monthly',
                'trial_period' => '30',
                'created_by' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('orders')->insert($data);
    }
}