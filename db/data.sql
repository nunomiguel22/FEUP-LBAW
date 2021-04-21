-----------------------------------------
-- Populate the database
-----------------------------------------


INSERT INTO country(id,name) VALUES (1,'Poland');
INSERT INTO country(id,name) VALUES (2,'France');
INSERT INTO country(id,name) VALUES (3,'Indonesia');
INSERT INTO country(id,name) VALUES (4,'Portugal');
INSERT INTO country(id,name) VALUES (5,'Germany');
INSERT INTO country(id,name) VALUES (6,'Argentina');
INSERT INTO country(id,name) VALUES (7,'Venezuela');
INSERT INTO country(id,name) VALUES (8,'Hungary');
INSERT INTO country(id,name) VALUES (9,'Russia');
INSERT INTO country(id,name) VALUES (10,'Sweden');
INSERT INTO country(id,name) VALUES (11,'South Africa');
INSERT INTO country(id,name) VALUES (12,'China');
INSERT INTO country(id,name) VALUES (13,'Yemen');
INSERT INTO country(id,name) VALUES (14,'Peru');
INSERT INTO country(id,name) VALUES (15,'Czech Republic');
INSERT INTO country(id,name) VALUES (16,'Greece');
INSERT INTO country(id,name) VALUES (17,'Netherlands');
INSERT INTO country(id,name) VALUES (18,'Philippines');
INSERT INTO country(id,name) VALUES (19,'Japan');
INSERT INTO country(id,name) VALUES (20,'Brazil');


INSERT INTO photo(id,path) VALUES (1,'LectusVestibulum.jpg');
INSERT INTO photo(id,path) VALUES (2,'NonMauris.gif');
INSERT INTO photo(id,path) VALUES (3,'FeugiatNon.jpg');
INSERT INTO photo(id,path) VALUES (4,'PlateaDictumst.jpg');
INSERT INTO photo(id,path) VALUES (5,'ArcuAdipiscingMolestie.jpg');
INSERT INTO photo(id,path) VALUES (6,'A.jpg');
INSERT INTO photo(id,path) VALUES (7,'AtDiamNam.jpg');
INSERT INTO photo(id,path) VALUES (8,'Non.pdf');
INSERT INTO photo(id,path) VALUES (9,'PedePosuereNonummy.jpg');
INSERT INTO photo(id,path) VALUES (10,'BibendumImperdietNullam.jpg');
INSERT INTO photo(id,path) VALUES (11,'ArcuAdipiscing.tiff');
INSERT INTO photo(id,path) VALUES (12,'CongueEgetSemper.jpg');
INSERT INTO photo(id,path) VALUES (13,'LigulaSit.jpg');
INSERT INTO photo(id,path) VALUES (14,'Donec.jpg');
INSERT INTO photo(id,path) VALUES (15,'LobortisSapienSapien.tiff');
INSERT INTO photo(id,path) VALUES (16,'TellusSemper.jpg');
INSERT INTO photo(id,path) VALUES (17,'ConsequatVarius.pdf');
INSERT INTO photo(id,path) VALUES (18,'InAnteVestibulum.jpg');
INSERT INTO photo(id,path) VALUES (19,'Quam.jpg');
INSERT INTO photo(id,path) VALUES (20,'Suspendisse.jpg');
INSERT INTO photo(id,path) VALUES (21,'AtTurpisDonec.gif');
INSERT INTO photo(id,path) VALUES (22,'JustoLaciniaEget.gif');
INSERT INTO photo(id,path) VALUES (23,'AcEstLacinia.tiff');
INSERT INTO photo(id,path) VALUES (24,'InAnte.jpg');
INSERT INTO photo(id,path) VALUES (25,'CrasMi.jpg');
INSERT INTO photo(id,path) VALUES (26,'Volutpat.jpg');
INSERT INTO photo(id,path) VALUES (27,'AeneanFermentum.jpg');
INSERT INTO photo(id,path) VALUES (28,'InFaucibusOrci.jpg');
INSERT INTO photo(id,path) VALUES (29,'RisusSemper.jpg');
INSERT INTO photo(id,path) VALUES (30,'Eu.jpg');


INSERT INTO developer(id,name) VALUES (1,'Vipe');
INSERT INTO developer(id,name) VALUES (2,'Wikido');
INSERT INTO developer(id,name) VALUES (3,'Twitterbridge');
INSERT INTO developer(id,name) VALUES (4,'Voonte');
INSERT INTO developer(id,name) VALUES (5,'Aimbu');
INSERT INTO developer(id,name) VALUES (6,'Youspan');
INSERT INTO developer(id,name) VALUES (7,'Geba');
INSERT INTO developer(id,name) VALUES (8,'Nlounge');
INSERT INTO developer(id,name) VALUES (9,'Jamia');
INSERT INTO developer(id,name) VALUES (10,'Bubblemix');
INSERT INTO developer(id,name) VALUES (11,'Skiba');
INSERT INTO developer(id,name) VALUES (12,'Yodo');
INSERT INTO developer(id,name) VALUES (13,'Shufflester');
INSERT INTO developer(id,name) VALUES (14,'Zoonoodle');
INSERT INTO developer(id,name) VALUES (15,'Gabtune');
INSERT INTO developer(id,name) VALUES (16,'Vinder');
INSERT INTO developer(id,name) VALUES (17,'Yakitri');
INSERT INTO developer(id,name) VALUES (18,'Buzzbean');
INSERT INTO developer(id,name) VALUES (19,'Eimbee');
INSERT INTO developer(id,name) VALUES (20,'Camido');

INSERT INTO category(id,name) VALUES (1,'Action');
INSERT INTO category(id,name) VALUES (2,'Drama');
INSERT INTO category(id,name) VALUES (3,'Thriller');
INSERT INTO category(id,name) VALUES (4,'Sci-Fi');
INSERT INTO category(id,name) VALUES (5,'Musical');
INSERT INTO category(id,name) VALUES (6,'Comedy');
INSERT INTO category(id,name) VALUES (7,'Horror');
INSERT INTO category(id,name) VALUES (8,'Western');
INSERT INTO category(id,name) VALUES (9,'Adventure');
INSERT INTO category(id,name) VALUES (10,'Shooter');
INSERT INTO category(id,name) VALUES (11,'Crime');

INSERT INTO tag(id,name) VALUES (1,'Action');
INSERT INTO tag(id,name) VALUES (2,'Drama');
INSERT INTO tag(id,name) VALUES (3,'Thriller');
INSERT INTO tag(id,name) VALUES (4,'Sci-Fi');
INSERT INTO tag(id,name) VALUES (5,'Musical');
INSERT INTO tag(id,name) VALUES (6,'Comedy');
INSERT INTO tag(id,name) VALUES (7,'Horror');
INSERT INTO tag(id,name) VALUES (8,'Western');
INSERT INTO tag(id,name) VALUES (9,'Adventure');
INSERT INTO tag(id,name) VALUES (10,'Shooter');
INSERT INTO tag(id,name) VALUES (11,'Crime');


INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (1,'03613 Glendale Avenue','Pescara',65129,'Frutillar','Abruzzi',1);
INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (2,'7343 Packers Avenue','Pescara',65129,'Maopingchang','Abruzzi',19);
INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (3,'678 Roxbury Road','Pescara',65129,'Xingzhen','Abruzzi',1);
INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (4,'02743 Waxwing Park','Pescara',65129,'Fengtai Chengguanzhen','Abruzzi',19);
INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (5,'8244 Village Avenue','Pescara',65129,'Kazaure','Abruzzi',4);
INSERT INTO addresses(id,line1,line2,postal_code,city,region,country_id) VALUES (6,'4730 Mcguire Way','Pescara',65129,'Gostyń','Abruzzi',17);

INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (1,'sderuel0@admin.ch','Sam','De Ruel','sderuel0','65G9omsD',7255446027,'true','true','true',1,1);
INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (2,'dwoodfine1@mozilla.com','Danielle','Woodfine','dwoodfine1','jHueoix',1351427237,'false','false','true',2,3);
INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (3,'kterrans2@nydailynews.com','Kettie','Terrans','kterrans2','tR5QebJOIh3h',4055779631,'true','true','true',3,2);
INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (4,'bgrills3@lulu.com','Birk','Grills','bgrills3','yBcdCc',9450750998,'true','true','false',5,4);
INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (5,'lcleatherow4@loc.gov','Lamond','Cleatherow','lcleatherow4','1WjY4gEB',2810810966,'false','false','true',4,5);
INSERT INTO "user"(id,email,first_name,last_name,username,password,nif,banned,restricted,is_admin,avatar_id,addresses_id) VALUES (6,'arait5@marketwatch.com','Atlante','Rait','arait5','QIePzSfJ',0504279289,'true','true','true',6,6);

INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (1,'39 Steps, The','Replacement of Lower Lip with Synth Sub, Extern Approach',58.54,3,'1/4/2021','true',NULL,4,8);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (2,'Roommate, The','Auditory Processing Assessment using Computer',62.52,5,'1/1/2021','false',NULL,1,8);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (3,'Daddy and Them','Dilation of Left Pulmonary Artery, Open Approach',74.56,5,'11/1/2020','true',NULL,2,7);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (4,'Jennifer''s Body','Contact Radiation of Uterus',7.73,1,'7/24/2020','true',NULL,2,1);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (5,'Ernest & Célestine (Ernest et Célestine)','Drainage of Nasopharynx with Drainage Device, Open Approach',20.5,3,'9/30/2020','false',NULL,10,8);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (6,'Le grand soir','Occlusion of R Brach Art with Intralum Dev, Perc Approach',2.64,5,'11/27/2020','true',NULL,13,10);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (7,'Detroit Metal City (Detoroito Metaru Shiti)','Replace Buttock Skin w Nonaut Sub, Full Thick, Extern',50.5,2,'4/6/2021','false',NULL,1,8);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (8,'Traffic','Ultrasonography of Bilateral Renal Arteries, Intravascular',29.88,3,'4/16/2021','true',NULL,7,1);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (9,'Gambling City','Repair Right Ureter, Via Natural or Artificial Opening',20.76,2,'9/26/2020','true',NULL,20,2);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (10,'Broken Vessels','Drain L Ext Jugular Vein w Drain Dev, Perc Endo',8.97,5,'9/30/2020','true',NULL,11,6);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (11,'7 Virgins (7 vírgenes)','Revision of Stimulator Lead in Upper Artery, Open Approach',25.37,2,'10/1/2020','true',NULL,1,11);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (12,'Trash Humpers','Removal of Ext Fix from L Pelvic Bone, Extern Approach',72.41,5,'3/22/2021','true',NULL,2,5);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (13,'M','Dilate R Popl Art, Bifurc, w Drug-elut Intra, Open',53.5,2,'1/16/2021','false',NULL,17,9);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (14,'Atomic Submarine, The','Change Brace on Left Lower Arm',34.45,5,'4/19/2020','true',1,10,10);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (15,'King of Escape, The (Le roi de l''évasion)','Supplement R Up Arm Subcu/Fascia w Autol Sub, Open',9.66,5,'10/3/2020','true',NULL,1,11);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (16,'Turbulence','Drainage of Right Carpal with Drainage Device, Perc Approach',18.05,5,'4/3/2021','false',NULL,14,1);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (17,'Remains of the Day, The','Insertion of Other Device into L Low Extrem, Open Approach',49.23,5,'6/12/2020','false',NULL,15,8);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (18,'High Society','Drainage of Left Nipple with Drainage Device, Open Approach',25.14,2,'10/26/2020','true',NULL,11,7);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (19,'Life of Pi','Restriction of Right Main Bronchus with Intralum Dev, Endo',90.79,4,'9/22/2020','true',7,20,10);
INSERT INTO game(id,title,description,price,score,launch_date,listed,parent_id,dev_id,category_id) VALUES (20,'Last Run','Revision of Intbd Fus Dev in C-thor Jt, Extern Approach',40.54,3,'8/17/2020','false',11,19,5);

INSERT INTO game_key(id,key,available,game_id) VALUES (1,7578466453,'false',13);
INSERT INTO game_key(id,key,available,game_id) VALUES (2,7974943076,'true',20);
INSERT INTO game_key(id,key,available,game_id) VALUES (3,1218582960,'true',15);
INSERT INTO game_key(id,key,available,game_id) VALUES (4,3184561836,'false',12);
INSERT INTO game_key(id,key,available,game_id) VALUES (5,0376537884,'true',20);
INSERT INTO game_key(id,key,available,game_id) VALUES (6,2913805906,'false',9);
INSERT INTO game_key(id,key,available,game_id) VALUES (7,7273371572,'false',8);
INSERT INTO game_key(id,key,available,game_id) VALUES (8,0254996434,'false',15);
INSERT INTO game_key(id,key,available,game_id) VALUES (9,5649957770,'false',9);
INSERT INTO game_key(id,key,available,game_id) VALUES (10,9851802131,'true',11);
INSERT INTO game_key(id,key,available,game_id) VALUES (11,3038852554,'false',12);
INSERT INTO game_key(id,key,available,game_id) VALUES (12,9828927284,'false',11);
INSERT INTO game_key(id,key,available,game_id) VALUES (13,7000479310,'false',13);
INSERT INTO game_key(id,key,available,game_id) VALUES (14,2154515878,'false',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (15,4793015255,'false',20);
INSERT INTO game_key(id,key,available,game_id) VALUES (16,8222502964,'false',7);
INSERT INTO game_key(id,key,available,game_id) VALUES (17,3639476298,'false',9);
INSERT INTO game_key(id,key,available,game_id) VALUES (18,8855338048,'true',6);
INSERT INTO game_key(id,key,available,game_id) VALUES (19,7669739924,'false',8);
INSERT INTO game_key(id,key,available,game_id) VALUES (20,5732887784,'false',19);
INSERT INTO game_key(id,key,available,game_id) VALUES (21,1052888755,'true',6);
INSERT INTO game_key(id,key,available,game_id) VALUES (22,8186325883,'true',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (23,9793461217,'false',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (24,5899301325,'false',17);
INSERT INTO game_key(id,key,available,game_id) VALUES (25,2205355724,'false',5);
INSERT INTO game_key(id,key,available,game_id) VALUES (26,3510328841,'false',9);
INSERT INTO game_key(id,key,available,game_id) VALUES (27,7295090517,'false',19);
INSERT INTO game_key(id,key,available,game_id) VALUES (28,7471666668,'true',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (29,5686284520,'true',15);
INSERT INTO game_key(id,key,available,game_id) VALUES (30,0765377047,'false',2);
INSERT INTO game_key(id,key,available,game_id) VALUES (31,3811969382,'true',10);
INSERT INTO game_key(id,key,available,game_id) VALUES (32,9268828863,'false',11);
INSERT INTO game_key(id,key,available,game_id) VALUES (33,2982965704,'true',9);
INSERT INTO game_key(id,key,available,game_id) VALUES (34,8500699655,'false',7);
INSERT INTO game_key(id,key,available,game_id) VALUES (35,9009703029,'true',12);
INSERT INTO game_key(id,key,available,game_id) VALUES (36,0613217861,'true',4);
INSERT INTO game_key(id,key,available,game_id) VALUES (37,8517584023,'false',17);
INSERT INTO game_key(id,key,available,game_id) VALUES (38,8754976391,'true',8);
INSERT INTO game_key(id,key,available,game_id) VALUES (39,1021916706,'false',12);
INSERT INTO game_key(id,key,available,game_id) VALUES (40,9514497856,'false',18);
INSERT INTO game_key(id,key,available,game_id) VALUES (41,6826456265,'true',19);
INSERT INTO game_key(id,key,available,game_id) VALUES (42,7413740990,'true',11);
INSERT INTO game_key(id,key,available,game_id) VALUES (43,5363704668,'false',18);
INSERT INTO game_key(id,key,available,game_id) VALUES (44,9719812796,'false',4);
INSERT INTO game_key(id,key,available,game_id) VALUES (45,2391658745,'false',11);
INSERT INTO game_key(id,key,available,game_id) VALUES (46,8393272521,'false',2);
INSERT INTO game_key(id,key,available,game_id) VALUES (47,8343772539,'true',6);
INSERT INTO game_key(id,key,available,game_id) VALUES (48,7585176910,'true',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (49,4691368256,'true',14);
INSERT INTO game_key(id,key,available,game_id) VALUES (50,6964227032,'false',17);


INSERT INTO game_image(photo_id,game_id) VALUES (3,15);
INSERT INTO game_image(photo_id,game_id) VALUES (4,20);
INSERT INTO game_image(photo_id,game_id) VALUES (16,1);
INSERT INTO game_image(photo_id,game_id) VALUES (1,5);
INSERT INTO game_image(photo_id,game_id) VALUES (14,15);
INSERT INTO game_image(photo_id,game_id) VALUES (15,2);
INSERT INTO game_image(photo_id,game_id) VALUES (30,1);
INSERT INTO game_image(photo_id,game_id) VALUES (19,8);
INSERT INTO game_image(photo_id,game_id) VALUES (2,14);
INSERT INTO game_image(photo_id,game_id) VALUES (7,1);
INSERT INTO game_image(photo_id,game_id) VALUES (10,18);
INSERT INTO game_image(photo_id,game_id) VALUES (17,3);
INSERT INTO game_image(photo_id,game_id) VALUES (29,2);
INSERT INTO game_image(photo_id,game_id) VALUES (24,16);
INSERT INTO game_image(photo_id,game_id) VALUES (27,2);
INSERT INTO game_image(photo_id,game_id) VALUES (12,20);
INSERT INTO game_image(photo_id,game_id) VALUES (21,3);
INSERT INTO game_image(photo_id,game_id) VALUES (5,10);
INSERT INTO game_image(photo_id,game_id) VALUES (22,12);
INSERT INTO game_image(photo_id,game_id) VALUES (13,17);
INSERT INTO game_image(photo_id,game_id) VALUES (18,8);


INSERT INTO game_tag(tag_id,game_id) VALUES (2,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (8,4);
INSERT INTO game_tag(tag_id,game_id) VALUES (1,3);
INSERT INTO game_tag(tag_id,game_id) VALUES (10,3);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,17);
INSERT INTO game_tag(tag_id,game_id) VALUES (6,18);
INSERT INTO game_tag(tag_id,game_id) VALUES (3,13);
INSERT INTO game_tag(tag_id,game_id) VALUES (7,14);
INSERT INTO game_tag(tag_id,game_id) VALUES (7,6);
INSERT INTO game_tag(tag_id,game_id) VALUES (1,14);

INSERT INTO in_cart(game_id,user_id) VALUES (4,1);
INSERT INTO in_cart(game_id,user_id) VALUES (6,1);
INSERT INTO in_cart(game_id,user_id) VALUES (5,2);
INSERT INTO in_cart(game_id,user_id) VALUES (14,5);
INSERT INTO in_cart(game_id,user_id) VALUES (8,5);

INSERT INTO in_wishlist(game_id,user_id) VALUES (3,3);
INSERT INTO in_wishlist(game_id,user_id) VALUES (7,1);
INSERT INTO in_wishlist(game_id,user_id) VALUES (16,5);
INSERT INTO in_wishlist(game_id,user_id) VALUES (14,1);
INSERT INTO in_wishlist(game_id,user_id) VALUES (7,5);

INSERT INTO purchase(id,timestamp,price,status,method,key_id,buyer_id) VALUES (1,'2020-07-08 19:39:21',76.56,'Pending','MB',10,1);
INSERT INTO purchase(id,timestamp,price,status,method,key_id,buyer_id) VALUES (2,'2020-05-23 18:22:59',52.65,'Pending','MB',5,3);
INSERT INTO purchase(id,timestamp,price,status,method,key_id,buyer_id) VALUES (3,'2020-05-16 07:26:33',4.4,'Completed','MB',2,1);
INSERT INTO purchase(id,timestamp,price,status,method,key_id,buyer_id) VALUES (4,'2020-11-12 20:46:48',53.77,'Pending','MB',3,4);
INSERT INTO purchase(id,timestamp,price,status,method,key_id,buyer_id) VALUES (5,'2020-05-05 15:40:20',3.53,'Completed','PayPal',49,5);

INSERT INTO review(id,description,publication_date,score,reviewer_id,game_id) VALUES (1,'Excision of tendon of hand for graft','12/26/2020',3,1,11);
INSERT INTO review(id,description,publication_date,score,reviewer_id,game_id) VALUES (2,'Biopsy of nose','5/25/2020',2,3,20);
INSERT INTO review(id,description,publication_date,score,reviewer_id,game_id) VALUES (3,'Limb lengthening procedures, tibia and fibula','11/3/2020',5,1,20);
INSERT INTO review(id,description,publication_date,score,reviewer_id,game_id) VALUES (4,'Diagnostic interview and evaluation, not otherwise specified','3/18/2020',2,4,15);
INSERT INTO review(id,description,publication_date,score,reviewer_id,game_id) VALUES (5,'Other division of bone, carpals and metacarpals','5/9/2020',3,5,14);


INSERT INTO report(id,description,r_type,submission_date,r_status,reporter_id,admin_id,review_id) VALUES (1,'Other specified injury of right renal vein, initial encounter','Review','1/2/2021','In Progress',5,5,1);
INSERT INTO report(id,description,r_type,submission_date,r_status,reporter_id,admin_id,review_id) VALUES (2,'Postprocedural hemorrhage of unspecified eye and adnexa following other procedure','Review','5/28/2020','In Progress',3,2,3);
INSERT INTO report(id,description,r_type,submission_date,r_status,reporter_id,admin_id,review_id) VALUES (3,'Superficial foreign body of unspecified back wall of thorax, initial encounter','Review','6/23/2020','In Progress',5,3,4);

-----------------------------------------
-- end
-----------------------------------------