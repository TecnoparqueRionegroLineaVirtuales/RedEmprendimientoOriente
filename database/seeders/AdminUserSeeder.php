<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
Use App\Models\User;
Use App\Models\products;
use App\Models\ProductInteraction;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        $role3 = Role::create(['name' => 'artista']);
        $entrepreneurRole = Role::create(['name' => 'Emprendedor']);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Usuario',
            'email' => 'user@test.com',
            'password' => bcrypt('asd123')
        ]);
        User::create([
            'name' => 'Artista',
            'email' => 'artista@test.com',
            'password' => bcrypt('asd123')
        ]);
        $user1 = User::find(1);
        $user1->assignRole($role1);

        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role3);

        $entrepreneur = User::create([
            'name' => 'Emprendedor',
            'email' => 'emprendedor@test.com',
            'password' => bcrypt('asd123')
        ]);
        $entrepreneur2 = User::create([
            'name' => 'Emprendedor Veterano',
            'email' => 'emprendedor2@test.com',
            'password' => bcrypt('asd123')
        ]);
        $entrepreneur->assignRole($entrepreneurRole);
        $entrepreneur2->assignRole($entrepreneurRole);

        $prodCoffe = products::create([
            'name' => 'Café Colombiano',
            'description' => 'Café de las montañas colombianas.',
            'price' => 15000,
            'amount' => 15,
            'url' => 'img/tcIgIJRRjdwXdaJVoIM8f734qPFLLLlB89MlKFVH.jpg',
            'status_id' => 1,
            'category_id' => 1,
        ]);
        $prodCookie = products::create([
            'name' => 'Galleta Artesanal',
            'description' => 'Galleta elaborada por manos campesinas.',
            'price' => 5000,
            'amount' => 15,
            'url' => 'img/tcIgIJRRjdwXdaJVoIM8f734qPFLLLlB89MlKFVH2.jpg',
            'status_id' => 1,
            'category_id' => 1,
        ]); 

        $productInteraction = ProductInteraction::create([
            'product_id'  => $prodCoffe->id,
            'user_id' => $entrepreneur->id]);
        $productInteraction2 = ProductInteraction::create([
            'product_id'  => $prodCookie->id,
            'user_id' => $entrepreneur->id]);
        $productInteraction3 = ProductInteraction::create([
                'product_id'  => $prodCoffe->id,
                'user_id' => $entrepreneur2->id]);
        $productInteraction4 = ProductInteraction::create([
                'product_id'  => $prodCookie->id,
                'user_id' => $entrepreneur2->id]);      
    }
}
