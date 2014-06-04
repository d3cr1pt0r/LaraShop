<?php

class DatabaseSeeder extends Seeder {

	public function run()
	{
                Eloquent::unguard();

                // Fill users table
                DB::table('users')->delete();
                DB::table('users')->insert(array('name'     => 'Klemen',
                			        'surname'   => 'Brajkovič',
                			        'email'     => 'klemen.brajkovic@gmail.com',
                			        'password'  => Hash::make('admin'),
                			        'type'      => 'admin'
                ));
                DB::table('users')->insert(array('name'     => 'Eva',
                			        'surname'   => 'Kaštrun',
                			        'email'     => 'eva.kastrun@gmail.com',
                			        'password'  => Hash::make('member'),
                			        'type'      => 'member'
                ));
                DB::table('users')->insert(array('name'     => 'Tomaž',
                			        'surname'   => 'Silič',
                			        'email'     => 'tomaz.silic@gmail.com',
                			        'password'  => Hash::make('admin'),
                			        'type'      => 'admin'
                ));

                // File categories table
                DB::table('categories')->delete();
                DB::table('categories')->insert(array('parent_id' => '0',
                        			      'name' 	  => 'Category 1',
                        			      'active' 	  => '1',
                        			      'position'  => '0'
                ));
                DB::table('categories')->insert(array('parent_id' => '0',
                        			      'name' 	  => 'Category 2',
                        			      'active' 	  => '1',
                        			      'position'  => '1'
                ));
                DB::table('categories')->insert(array('parent_id' => '0',
                        			      'name' 	  => 'Category 3',
                        			      'active'    => '1',
                        			      'position'  => '2'
                ));
                DB::table('categories')->insert(array('parent_id' => '1',
                        			      'name' 	  => 'Category 1-1',
                        			      'active'    => '1',
                        			      'position'  => '0'
                ));
                DB::table('categories')->insert(array('parent_id' => '1',
                        			      'name' 	  => 'Category 1-2',
                        			      'active'    => '1',
                        			      'position'  => '1'
                ));

                // Fill products table
                DB::table('products')->delete();
                DB::table('products')->insert(array('code'        => '1000',
                                                    'category_id' => '1',
                                                    'name'        => 'Product 1',
                                                    'description' => 'Product 1 description',
                                                    'price'       => '10.00',
                                                    'stock'       => '5',
                                                    'active'      => '1',
                                                    'position'    => '1'
                ));
                DB::table('products')->insert(array('code'        => '1001',
                                                    'category_id' => '1',
                                                    'name'        => 'Product 2',
                                                    'description' => 'Product 2 description',
                                                    'price'       => '12.00',
                                                    'stock'       => '5',
                                                    'active'      => '1',
                                                    'position'    => '2'
                ));
                DB::table('products')->insert(array('code'        => '1002',
                                                    'category_id' => '1',
                                                    'name'        => 'Product 3',
                                                    'description' => 'Product 3 description',
                                                    'price'       => '14.00',
                                                    'stock'       => '5',
                                                    'active'      => '1',
                                                    'position'    => '3'
                ));
                DB::table('products')->insert(array('code'        => '1003',
                                                    'category_id' => '1',
                                                    'name'        => 'Product 4',
                                                    'description' => 'Product 4 description',
                                                    'price'       => '16.00',
                                                    'stock'       => '5',
                                                    'active'      => '1',
                                                    'position'    => '4'
                ));

                DB::table('carousel')->insert(array('name'     => 'Carousel 1',
                                                    'active'   => '1',
                                                    'position' => '0'
                ));
	}

}
