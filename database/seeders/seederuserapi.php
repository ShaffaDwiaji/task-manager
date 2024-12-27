<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class seederuserapi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $Permissions = [
            'Lihat Task',
            'Buat Task',
            'Ubah Task',
            'Hapus Task'
        ];
        
        foreach($Permissions as $Permission)
            Permission::create(['name'=> $Permission]);
        
        $role1 = Role::create(['name'=>'superadmin']);
        $role1 -> givePermissionTo(Permission::all());
        
        $role2 = Role::create(['name'=>'user']);
        $role2 -> givePermissionTo(['Lihat Task']);

        $superadmin = User::create([
            'name'=> "Superman",
            'email'=> "superman123@gmail.com",
            'password'=> Hash::make("kuma12345")
            
        ]);
        $superadmin->assignRole($role1);

        $orangbiasa = User::create([
            'name' => "orangbiasa",
            'email'=> "orangbiasa@gmail.com",
            'password'=> Hash::make ("orangejussy123")
        ]);
        $orangbiasa->assignRole($role2);

    }
}
