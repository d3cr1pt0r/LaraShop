<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		// Fill users table
		DB::table('users')->delete();
		DB::table('users')->insert(array('name'     => 'Klemen',
									     'surname'  => 'Brajkovič',
									     'email'    => 'klemen.brajkovic@gmail.com',
									     'password' => Hash::make('admin'),
									     'type'     => 'admin'
	    ));
		DB::table('users')->insert(array('name'     => 'Eva',
									     'surname'  => 'Kaštrun',
									     'email'    => 'eva.kastrun@gmail.com',
									     'password' => Hash::make('member'),
									     'type'     => 'member'
	    ));
		DB::table('users')->insert(array('name'     => 'Tomaž',
									     'surname'  => 'Silič',
									     'email'    => 'tomaz.silic@gmail.com',
									     'password' => Hash::make('admin'),
									     'type'     => 'admin'
	    ));

		// File categories table
	    DB::table('categories')->delete();
		DB::table('categories')->insert(array('parent_id' => '-1',
                                			  'name' => 'Category 1',
                                			  'active' => '1',
                                			  'position' => '0'
        ));
        DB::table('categories')->insert(array('parent_id' => '-1',
                                			  'name' => 'Category 2',
                                			  'active' => '1',
                                			  'position' => '1'
        ));
        DB::table('categories')->insert(array('parent_id' => '-1',
                                			  'name' => 'Category 3',
                                			  'active' => '1',
                                			  'position' => '2'
        ));
        DB::table('categories')->insert(array('parent_id' => '1',
                                			  'name' => 'Category 1-1',
                                			  'active' => '1',
                                			  'position' => '0'
        ));
        DB::table('categories')->insert(array('parent_id' => '1',
                                			  'name' => 'Category 1-2',
                                			  'active' => '1',
                                			  'position' => '1'
        ));
	}

}
