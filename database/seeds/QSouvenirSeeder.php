<?php

use Illuminate\Database\Seeder;

class QSouvenirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //init user
        $users=[
            ['name'=>'admin','email'=>'admin@Qualitysouvenirs.com','password'=>bcrypt('P@ssw0rd'),'type'=>'admin','email_verified_at'=>date("Y-m-d H:i:s")],
        ];
        DB::table('users')->insert($users);



        //init data
        $categories=[
            ['name'=>'Maori Gifts'],
            ['name'=>'Mugs'],
            ['name'=>'T-Shirts'],
            ['name'=>'Hats']
        ];
        DB::table('categories')->insert($categories);

        $suppliers=[
            ['name'=>'Maori Local','email'=>'infor@mlocal.com','contactPerson'=>'Dahi Morle','phone'=>'0212523355','address'=>'99 Queens Road, Lower Hut, Wellington, New Zealand'],
            ['name'=>'Natural Goods','email'=>'infor@ngoods.com','contactPerson'=>'Eric White','phone'=>'0212511189','address'=>'1239 New North Road, Avondale, Auckland, New Zealand']
        ];
        DB::table('suppliers')->insert($suppliers);

       
        $souvenirs=[
         
         //gifts
         ['name'=>'Cotton Scarf','description'=>'100% Cotton, natural non-allergic and soft fabric.You can style this HANDMADE neck scarf as SHAWL, WRAP, as INFINITY scarf or tie around your head.','price'=>'65.99','pathOfImage'=>'gift001.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Silk Scarf','description'=>'Great as a shawl, head wrap, hijab, stole or light scarves for women. Wrap this pashmina scarf around your shoulder will warm you body in a evening night.','price'=>'35.99','pathOfImage'=>'gift002.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Wool Scarf','description'=>'100% fine wool from Australia, bringing excellent warm feeling without making you feel heavy.','price'=>'75.99','pathOfImage'=>'gift003.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Blanket','description'=>'100% polar fleece blanket - high quality collection of luxury and cozy polar fleece fabric.Lightweight, ultra-soft, warm, and durable blanket. Classic luxuriously looking plaid pattern design in variety of colors.','price'=>'55.99','pathOfImage'=>'gift004.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Toy','description'=>'Embroidered eye and nose details ensure safe use for all ages. Machine-washable. Ages 0+.','price'=>'15.99','pathOfImage'=>'gift005.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Blanket','description'=>'100% polar fleece blanket - high quality collection of luxury and cozy polar fleece fabric.','price'=>'45.99','pathOfImage'=>'gift006.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Green Plants','description'=>'Incredibly detailed characteristics - these succulents look and feel real. Extremely colorful and lifelike. Great for home and office, wreaths, bouquets, gifts, and other arrangments.','price'=>'4.99','pathOfImage'=>'gift007.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Bear Toy','description'=>'Embroidered eye and nose details ensure safe use for all ages. Machine-washable. ','price'=>'15.99','pathOfImage'=>'gift008.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Letter Toys','description'=>'Incredibly detailed characteristics','price'=>'6.99','pathOfImage'=>'gift009.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Carrot Toys','description'=>'Incredibly detailed characteristics','price'=>'7.99','pathOfImage'=>'gift010.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Doggy Toy','description'=>'Incredibly detailed characteristics. Machine-washable.','price'=>'11.99','pathOfImage'=>'gift011.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Bear Toy','description'=>'100% fine wool from Australia, bringing excellent warm feeling without making you feel heavy.','price'=>'10.99','pathOfImage'=>'gift012.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Wool Scarf','description'=>'100% fine wool from Australia, bringing excellent warm feeling without making you feel heavy.', 'price'=>'37.99','pathOfImage'=>'gift013.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Kiwibird Sculpture','description'=>'Stretched Canvas ready to be put on the wall. Satisfaction Guarantee 100%. Brighten your home of Office with the art prints from our store.','price'=>'19.99','pathOfImage'=>'gift014.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'All Black Toy','description'=>'Bring New Zealand to your home. Best souvenir ever.','price'=>'25.99','pathOfImage'=>'gift015.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Kiwibird Toy','description'=>'Stretched Canvas ready to be put on the wall. Satisfaction Guarantee 100%.','price'=>'12.99','pathOfImage'=>'gift016.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'All Black Toy','description'=>'Bring New Zealand to your home. Best souvenir ever.','price'=>'25.99','pathOfImage'=>'gift017.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'All Black Board','description'=>'Bring New Zealand to your home. Best souvenir ever.','price'=>'22.99','pathOfImage'=>'gift018.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Pillow Cover','description'=>'All fabric edges are sewn with zigzag overlock stitch to prevent fray and ensure durability.','price'=>'36.99','pathOfImage'=>'gift019.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Art Pillow Cover','description'=>' Soft, Textured, made with color matching invisible zipper and allows easy insertion and removal of pillow inserts.','price'=>'31.99','pathOfImage'=>'gift020.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Mari Jade','description'=>'Green Aventurine Jade Helps with sexual imbalances and grief caused by sexual abuse','price'=>'55.99','pathOfImage'=>'gift021.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Mari Bag','description'=>'This is the perfect market tote you can use. You can carry from your groceries to your study books. Use the tote as a beach bag too!','price'=>'65.99','pathOfImage'=>'gift022.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Mari Sculpture','description'=>'Incredibly detailed characteristics.','price'=>'75.99','pathOfImage'=>'gift023.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Mari Sculpture','description'=>'Incredibly detailed characteristics.','price'=>'65.99','pathOfImage'=>'gift024.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Jade Necklace','description'=>'Green Aventurine Jade Helps with sexual imbalances and grief caused by sexual abuse','price'=>'25.99','pathOfImage'=>'gift025.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Mari Jade','description'=>'Green Aventurine Jade Helps with sexual imbalances and grief caused by sexual abuse','price'=>'35.99','pathOfImage'=>'gift026.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Kiwi Lighter','description'=>'Bring New Zealand to your home. Best souvenir ever.','price'=>'29.99','pathOfImage'=>'gift027.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Kiwi Toy','description'=>'Bring New Zealand to your home. Best souvenir ever.','price'=>'15.99','pathOfImage'=>'gift028.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Jade Bracelet','description'=>'This Amber Bracelet is made on Elastic Band so it can slightly adjust in size.  This bracelet is packed together with a pouch so it can be a great gift for any occasion.','price'=>'35.99','pathOfImage'=>'gift029.png','category_id'=>'1','supplier_id'=>'1'],
         ['name'=>'Jade Bracelet','description'=>'This Amber Bracelet is made on Elastic Band so it can slightly adjust in size.  This bracelet is packed together with a pouch so it can be a great gift for any occasion.','price'=>'39.99','pathOfImage'=>'gift030.png','category_id'=>'1','supplier_id'=>'1'],
         
         //Hats
         ['name'=>'Doggy Hat','description'=>'Yellow wool doggy hat, best gift for your little doggy.','price'=>'0.00','pathOfImage'=>'hat001.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'White Hat','description'=>'White beautiful hat for travel.','price'=>'7.99','pathOfImage'=>'hat002.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Brown Hat','description'=>'hat on sale','price'=>'9.99','pathOfImage'=>'hat003.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Red Hat','description'=>'hat on sale','price'=>'15.99','pathOfImage'=>'hat004.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Travel Hat','description'=>'hat on sale','price'=>'11.99','pathOfImage'=>'hat005.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Green Hat','description'=>'hat on sale','price'=>'12.99','pathOfImage'=>'hat006.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Green Hat','description'=>'hat on sale','price'=>'8.99','pathOfImage'=>'hat007.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Catty Hat','description'=>'Not On sale','price'=>'0.00','pathOfImage'=>'hat008.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Kids Hat','description'=>'hat on sale','price'=>'8.99','pathOfImage'=>'hat009.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Mil Hat','description'=>'hat on sale','price'=>'9.99','pathOfImage'=>'hat010.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Love Hat','description'=>'hat on sale','price'=>'11.99','pathOfImage'=>'hat011.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Trip Hat','description'=>'hat on sale','price'=>'15.99','pathOfImage'=>'hat012.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Lady Hat','description'=>'hat on sale','price'=>'18.99','pathOfImage'=>'hat013.png','category_id'=>'4','supplier_id'=>'2'],
         ['name'=>'Sun Hat','description'=>'hat on sale','price'=>'8.99','pathOfImage'=>'hat014.png','category_id'=>'4','supplier_id'=>'2'],
         
         //MuSouvenir
         ['name'=>'Coffe Cup','description'=>'Cup on Sale','price'=>'5.99','pathOfImage'=>'cup001.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'White Cup','description'=>'Cup on Sale','price'=>'6.99','pathOfImage'=>'cup002.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Lady Cup','description'=>'Cup on Sale','price'=>'6.99','pathOfImage'=>'cup003.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Coffe Cup','description'=>'Cup on Sale','price'=>'5.99','pathOfImage'=>'cup004.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Coffe Cup','description'=>'Cup on Sale','price'=>'4.99','pathOfImage'=>'cup005.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Coffe Cups','description'=>'Cup on Sale','price'=>'12.99','pathOfImage'=>'cup006.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Tea Cup','description'=>'Cup on Sale','price'=>'7.99','pathOfImage'=>'cup007.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'White Cup','description'=>'Cup on Sale','price'=>'8.99','pathOfImage'=>'cup008.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'White Cup','description'=>'Cup on Sale','price'=>'6.99','pathOfImage'=>'cup009.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Gray Cup','description'=>'Cup on Sale','price'=>'8.99','pathOfImage'=>'cup010.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Mug','description'=>'Cup on Sale','price'=>'7.99','pathOfImage'=>'cup011.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'White Mug','description'=>'Cup on Sale','price'=>'9.99','pathOfImage'=>'cup012.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'White Mug','description'=>'Cup on Sale','price'=>'8.99','pathOfImage'=>'cup013.png','category_id'=>'2','supplier_id'=>'2'],
         ['name'=>'Blue cup','description'=>'Cup on Sale','price'=>'6.99','pathOfImage'=>'cup014.png','category_id'=>'2','supplier_id'=>'2'],
        
         //T-Shirts
         ['name'=>'Mans Color','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt001.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt002.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Woman','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt003.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt004.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Woman','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt005.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Woman','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt006.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt007.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt008.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Doddy','description'=>'Not On Sale','price'=>'0.00','pathOfImage'=>'t-shirt009.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt010.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'all Black','description'=>'On Sale','price'=>'34.99','pathOfImage'=>'t-shirt011.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Girl','description'=>'On Sale','price'=>'18.99','pathOfImage'=>'t-shirt012.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Girl','description'=>'On Sale','price'=>'18.99','pathOfImage'=>'t-shirt013.png','category_id'=>'3','supplier_id'=>'2'],
         ['name'=>'T-Shirt Man','description'=>'On Sale','price'=>'24.99','pathOfImage'=>'t-shirt014.png','category_id'=>'3','supplier_id'=>'2']
        ];
        DB::table('souvenirs')->insert($souvenirs);

    }
} 