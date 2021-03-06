#---------------------------------------------
-- SCRIPT SQL
#---------------------------------------------


SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `gamescreening` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gamescreening`;

CREATE TABLE `wc5m2_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(150) NOT NULL,
  `goodAnswer` tinyint(1) NOT NULL,
  `id_questions` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_questions_FK` (`id_questions`),
  CONSTRAINT `answers_questions_FK` FOREIGN KEY (`id_questions`) REFERENCES `wc5m2_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `publicationDate` datetime NOT NULL,
  `picture` varchar(255) NOT NULL,
  `headline` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_articles` (`id`, `title`, `content`, `publicationDate`, `picture`, `headline`) VALUES
(13,	'Test',	'Gdfgdsgfsdg',	'2022-02-03 00:00:00',	'../../uploads/cryptoIsDead.jpg',	'Efdgdfg');

CREATE TABLE `wc5m2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_FK` (`id_users`),
  KEY `comments_articles_FK` (`id_articles`),
  CONSTRAINT `comments_articles_FK` FOREIGN KEY (`id_articles`) REFERENCES `wc5m2_articles` (`id`),
  CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_mods` int(11) DEFAULT NULL,
  `id_games` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_mods_FK` (`id_mods`),
  KEY `evaluations_games_FK` (`id_games`),
  KEY `evaluations_users_FK` (`id_users`),
  CONSTRAINT `evaluations_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`),
  CONSTRAINT `evaluations_mods_FK` FOREIGN KEY (`id_mods`) REFERENCES `wc5m2_mods` (`id`),
  CONSTRAINT `evaluations_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `developpers` varchar(255) NOT NULL,
  `releaseDate` date NOT NULL,
  `earlyExitDate` date NOT NULL,
  `summary` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_graphisms` int(11) NOT NULL,
  `id_types` int(11) NOT NULL,
  `id_platforms` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `games_graphisms_FK` (`id_graphisms`),
  KEY `games_types_FK` (`id_types`),
  KEY `games_platforms_FK` (`id_platforms`),
  CONSTRAINT `games_graphisms_FK` FOREIGN KEY (`id_graphisms`) REFERENCES `wc5m2_graphisms` (`id`),
  CONSTRAINT `games_platforms_FK` FOREIGN KEY (`id_platforms`) REFERENCES `wc5m2_platforms` (`id`),
  CONSTRAINT `games_types_FK` FOREIGN KEY (`id_types`) REFERENCES `wc5m2_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_games` (`id`, `title`, `developpers`, `releaseDate`, `earlyExitDate`, `summary`, `trailer`, `picture`, `id_graphisms`, `id_types`, `id_platforms`) VALUES
(1,	'Undungeon',	'Laughing Machines',	'2021-11-18',	'2021-11-18',	'?? mi-chemin entre l\'action et le jeu de r??le, Undungeon reprend tous les ??l??ments qui ont donn?? aux A-RPG d\'antan leurs lettres de noblesse et les transcende gr??ce ?? un design r??solument moderne. R??tablissez l\'ordre dans toutes les dimensions, influencez et d??terminez le destin des mondes et forgez l\'avenir du nouveau Multivers.',	'https://www.youtube.com/embed/XVmjl2o3PUw',	'../../uploads/Action carroussel maquette 2.jpg',	3,	1,	1),
(2,	'Bright Memory',	'FYQD-Studio',	'2020-03-25',	'2019-01-12',	'Bright Memory est un jeu m??langeant FPS et action cr???? ?? l\'aide d\'Unreal Engine par le studio de d??veloppement FYQD compos?? d\'une seule personne. Combinez une grande vari??t?? de techniques et de capacit??s pour r??aliser de superbes combos d\'attaque ?? la vitesse de la lumi??re tout en d??couvrant les aventures de Shelia, agent du SRO (Supernatural Science Research Organization) !',	'https://www.youtube.com/embed/MmmBuE_mYS0',	'../../uploads/Action carroussel maquette.jpg',	2,	3,	1),
(3,	'Hollow Knight: Silksong',	'Team Cherry',	'2022-02-01',	'2022-02-01',	'Devenez la princesse chevalier\r\nIncarnez Hornet, la princesse protectrice d\'Hallownest, et partez ?? l\'aventure dans un tout nouveau royaume gouvern?? par la soie et le chant ! Captur??e et amen??e dans ce monde inconnu, Hornet doit combattre des ennemis et r??soudre des myst??res alors qu\'elle monte dans un p??lerinage mortel au sommet du royaume.\r\n\r\nHollow Knight: Silksong est la suite ??pique de Hollow Knight, l\'action-aventure prim??e. En tant que chasseur mortel Hornet, voyagez vers de toutes nouvelles terres, d??couvrez de nouveaux pouvoirs, combattez de vastes hordes d\'insectes et de b??tes et d??couvrez d\'anciens secrets li??s ?? votre nature et ?? votre pass??.',	'https://www.youtube.com/embed/UAO2urG23S4',	'../../uploads/Action carroussel maquette3.jpg',	1,	1,	1),
(4,	'Aim Lab',	'Statespace',	'2018-02-07',	'2018-02-07',	'Aim Lab est encore au d??but de sa phase b??ta.. Seulement 40% du jeux est termin?? donc vous trouverez encore des bugs ! Nous travaillons sur des nouvelles fonctionnalit??s, comme le support d\'autres langues et plus d\'options de personnalisation ! Contribuez au projet en postant sur notre forum Steam ou en rejoignant notre Discord!',	'https://www.youtube.com/embed/TbpzIh3sp0Y',	'../../uploads/aimlab.jpg',	2,	3,	1),
(5,	'ARK: Genesis Season Pass',	'Studio Wildcard, Instinct Games, Efecto Studios, Virtual Basement LLC',	'2019-08-08',	'2019-08-08',	'Votre qu??te de survie ultime est maintenant termin??e avec le Season Pass ARK: Genesis, comprenant la partie 1 et la partie 2! Dans ces extensions, vous conclurez le sc??nario ARK tout en vous aventurant dans de nouveaux mondes exotiques avec un tout nouveau gameplay bas?? sur les missions. D??couvrez, utilisez et ma??trisez de nouvelles cr??atures, de nouveaux objets ?? fabriquer, des armes et des structures qui ne ressemblent ?? rien de ce que vous avez encore vu! La saga est maintenant termin??e et des centaines d\'heures de nouveau gameplay ARK ax?? sur l\'histoire vous attendent!',	'https://www.youtube.com/embed/QJifr55qf6E',	'../../uploads/arkGenesis.jpg',	2,	3,	1),
(6,	'Baba Is You',	'Hempuli Oy',	'2019-03-13',	'2019-03-13',	'Baba Is You est un jeu de r??flexion prim?? dans lequel vous pouvez changer les r??gles du jeu lui-m??me. Dans chaque niveau, les r??gles se pr??sentent sous forme de blocs amovibles : les manipuler alt??re le fonctionnement du niveau et provoque des interactions inattendues ! Une simple pouss??e sur un bloc peut vous transformer en rocher, changer des mottes d\'herbe en obstacles br??lants et m??me m??tamorphoser l???objectif ?? atteindre.',	'https://www.youtube.com/embed/Ca5BYKRVXHM',	'../../uploads/baba.jpg',	1,	15,	1),
(7,	'BattleBlock Theater??',	'The Behemoth',	'2014-05-15',	'2014-05-15',	'??chou????? captur????? trahi??? contraint de se donner en spectacle devant un public f??lin !? Oui, tout ??a et bien plus encore dans BattleBlock Theater ! Une fois lanc?? dans votre qu??te pour lib??rer plus de 300 de vos amis faits prisonniers par des chats diaboliques et hautement ??volu??s, il n\'y aura plus de retour possible. Plongez au c??ur de cette histoire de trahison renversante et usez de votre arsenal d\'armes-outils pour progresser dans des centaines de niveaux et ??lucider le myst??re qui plane sur BattleBlock Theater.\r\n\r\nSi vous n\'aimez pas ??tre seul sous les feux des projecteurs, partez en ligne ou trouvez un bon copain en chair et en os pour accomplir une qu??te cooptimis??e aux petits oignons ou participer aux ar??nes. Le jeu inclut ??galement un ??diteur de niveaux pour vous permettre de cr??er vous-m??me des ??preuves et d??fis tordus !',	'https://www.youtube.com/embed/pv1ZoHt6poI',	'../../uploads/battle.jpg',	1,	3,	1),
(8,	'Beat Saber',	'Beat Games',	'2019-05-21',	'2019-05-21',	'Beat Saber est une exp??rience rythmique immersive sans pr??c??dent ! D??couvrez des tonnes de niveaux con??us ?? la main et laissez-vous happer par une musique ??lectronique entra??nante, le tout dans un environnement futuriste. Utilisez vos sabres pour trancher les notes ?? mesure qu\'elles arrivent vers vous. Chaque cube indique quel sabre vous devez utiliser et dans quelle direction vous devez trancher.',	'https://www.youtube.com/embed/vL39Sg2AqWg',	'../../uploads/beatsaber.jpg',	2,	15,	1),
(9,	'Blade and Sorcery',	'WarpFrog',	'2018-12-11',	'2018-12-11',	'L\'??re du combat ?? l\'??p??e en apesanteur en r??alit?? virtuelle est r??volue. Blade & Sorcery est un bac ?? sable fantastique m??di??val pas comme les autres, ax?? sur les combats de m??l??e, ?? distance et magiques qui utilise pleinement un syst??me d\'interaction et de combat unique et r??aliste bas?? sur la physique.\r\n',	'https://www.youtube.com/embed/fOJkoHDfaNU',	'../../uploads/blade.jpg',	2,	12,	1),
(10,	'Boneworks',	'Stress Level Zero',	'2019-12-10',	'2019-12-10',	'BONEWORKS est une aventure d\'action narrative en r??alit?? virtuelle utilisant des m??canismes physiques exp??rimentaux avanc??s. Naviguez de mani??re dynamique dans des environnements, engagez-vous dans des combats lourds de physique et abordez de mani??re cr??ative des ??nigmes avec la physique.',	'https://www.youtube.com/embed/oP8C2nmv3Ag',	'../../uploads/bones.jpg',	2,	17,	1),
(11,	'Boundless',	'Wonderstruck',	'2018-09-11',	'2018-09-11',	'Boundless est un MMO sans abonnement soutenu par des achats int??gr??s optionnels.\r\n\r\nDans un univers infini de mondes connect??s, tous les choix du joueur auront un impact. Explorateur ? Constructeur ? Chasseur ? Commer??ant ? Artisan ? Suivez votre propre voie.\r\n\r\nOuvrez des portails pour voyager sans probl??me entre diverses plan??tes ?? mesure que vous vivez votre aventure ?? travers l\'univers. Regardez le soleil se lever sur un monde volcanique avant de rejoindre des amis pour prospecter de pr??cieuses ressources sur une plan??te d??sertique.',	'https://www.youtube.com/embed/qZh_O32HsZ0',	'../../uploads/boundless.jpg',	2,	12,	1),
(12,	'CARRION',	'Phobia Game Studio',	'2020-07-23',	'2020-07-23',	'CARRION est un jeu d\'horreur invers?? : vous incarnez une cr??ature informe d\'origine inconnue, captive d\'un complexe de recherche. Traquez vos ge??liers pour les d??vorer sans aucune piti??, et semez la terreur dans votre sillage. Grandissez, grossissez et ??voluez tout en d??molissant cette gigantesque prison et profitez-en pour d??bloquer des capacit??s de plus en plus d??vastatrices. Votre vengeance sera sanglante !',	'https://www.youtube.com/embed/Ozknd5FBFE4',	'../../uploads/carrion.jpg',	3,	3,	1),
(13,	'Potion Craft',	'Niceplay games',	'2021-09-21',	'2021-09-21',	'Apprenez l\'art de la fabrication de potions\r\nConcoctez votre potion. Moulez des ingr??dients et m??langez-les soigneusement dans votre chaudron. Chauffez les charbons ardents. Faites bouillir, m??langez. Ajoutez la base : eau, huile, ou... autre chose. Bravo, vous avez cr???? votre premi??re potion ! C\'??tait facile ?? apprendre ? Essayez maintenant de ma??triser la technique !',	'https://www.youtube.com/embed/iGNAAflyjac',	'../../uploads/potion image.jpg',	3,	17,	1),
(14,	'Celeste',	'Extremely OK Games, Ltd.',	'2018-01-25',	'2018-01-25',	'Aidez Madeline ?? survivre ?? ses d??mons int??rieurs au mont Celeste, dans ce jeu de plateformes ultra relev?? fait ?? la main, r??alis?? par les cr??ateurs du classique TowerFall.',	'https://www.youtube.com/embed/wpPbNgFEetU',	'../../uploads/celeste.jpg',	3,	3,	1),
(15,	'Command & Conquer??? Remastered Collection',	'Petroglyph, Lemon Sky Studios',	'2020-06-05',	'2020-06-05',	'Command & Conquer et Alerte Rouge ont d??fini le genre des jeux STR il y a 25 ans et viennent d\'??tre enti??rement remast??ris??s en 4K par les anciens membres de l?????quipe de Westwood Studios, aujourd\'hui chez Petroglyph Games. Inclut les 3 packs d\'extension, le multijoueur remodel??, une interface modernis??e, un ??diteur de cartes, une galerie de photos FMV in??dites et plus de 7 heures de musique l??gendaire remast??ris??e par Frank Klepacki. Bienvenue, Commandant !',	'https://www.youtube.com/embed/9iMfypQj3k0',	'../../uploads/commandConquer.jpg',	1,	18,	1),
(16,	'Crypto Is Dead',	'The Moon Pirates',	'2021-07-23',	'2021-07-23',	'Crypto Is Dead pourrait ??tre qualifi?? de \"Papers, Please\"-like. C\'est un mix entre simulation et jeu de puzzle dans lequel vous allez devoir faire fructifier votre banque durant 30 jours. Pour cela, vous devrez v??rifier des billets et trouver s\'ils sont authentiques ou non. Au cours de votre mois de travail, vous allez devoir accumuler de l\'argent, payer des taxes et mettre ?? jour vos outils pour suivre le rythme de la Banque Centrale.',	'https://www.youtube.com/embed/hCrLZCHAQSA',	'../../uploads/cryptoIsDead.jpg',	3,	17,	1),
(17,	'Darkest Dungeon??',	'Red Hook Studios',	'2016-01-19',	'2016-01-19',	'Darkest Dungeon est un JdR rogue-like au tour par tour, gothique et sans piti??, sur le stress psychologique de partir ?? l\'aventure.\r\n\r\nRecrute, entra??ne et m??ne une ??quipe d\'anti-h??ros au travers de for??ts d??form??es, de tani??res oubli??es, de cryptes en ruines et au-del??. Tu combattras non seulement des ennemis inimaginables mais aussi le stress, la famine, la maladie et les envahissantes t??n??bres. D??couvre d\'??trange myst??res et lance les h??ros contre un ensemble de monstres effrayants gr??ce ?? un syst??me de combat au tour par tour innovant.',	'https://www.youtube.com/embed/AQLxdHfMPF8',	'../../uploads/darkestDungeon.jpg',	1,	12,	1),
(18,	'Dead Cells',	'Motion Twin',	'2018-08-06',	'2018-08-06',	'Vous avez grandi avec les roguelikes, connu la mont??e des roguelites, et m??me assist?? ?? la naissance des roguelites-lite ? Laissez-nous vous pr??senter notre modeste contribution ?? cette honorable lign??e: le RogueVania, enfant ill??gitime n?? du mariage entre un roguelite moderne (Rogue Legacy, Binding of Isaac, Enter the Gungeon, Spelunky, etc.) et un Metroidvania ?? l???ancienne.',	'https://www.youtube.com/embed/-5jPXBDDRb0',	'../../uploads/dead.jpg',	3,	1,	1),
(19,	'Despot\'s Game: Dystopian Army Builder',	'Konfa Games',	'2021-10-14',	'2021-10-14',	'Savant m??lange de tactiques rogue-like et de batailles explosives, Despot???s Game vous met au d??fi de lever une arm??e et d???en sacrifier tous les bidasses jusqu???au dernier pour atomiser les ennemis... et d???autres joueurs !',	'https://www.youtube.com/embed/Ge3QYg9U60g',	'../../uploads/DespotGame.jpg',	3,	18,	1),
(22,	'Disco Elysium',	'ZA & UM',	'2019-10-19',	'2019-10-19',	'Disco Elysium - The Final Cut est un jeu de r??le r??volutionnaire dans un monde ouvert. Vous ??tes un enqu??teur, avec un syst??me de talents unique en son genre et tout un pan urbain ?? arpenter. Interrogez des personnages inoubliables, r??solvez des crimes ou acceptez des pots-de-vin. Libre ?? vous d???incarner un h??ros ou une ??pave humaine irr??cup??rable.',	'https://www.youtube.com/embed/YV2lp6p_gXw',	'../../uploads/disco.jpg',	2,	12,	1),
(23,	'Divinity Original Sin 2',	'Larian Studios',	'2017-09-14',	'2017-09-14',	'Le Divin est mort, le N??ant approche ?? grands pas, et la puissance qui sommeille en vous est sur le point de s\'??veiller. Le combat pour la divinit?? a commenc??. Soupesez vos d??cisions avec soin et accordez votre confiance avec parcimonie, car les t??n??bres r??dent dans tous les c??urs.',	'https://www.youtube.com/embed/bTWTFX8qzPI',	'../../uploads/divinity.jpg',	2,	12,	1),
(24,	'Don\'t Starve Together',	'Klei Entertainment',	'2016-04-21',	'2016-04-21',	'Don\'t Starve Together est l???extension multijoueur autonome de Don???t Starve, le jeu de survie intransigeant qui se d??roule dans un univers sauvage.\r\n\r\nEntrez dans un monde bizarre et inexplor??, plein d?????tranges cr??atures, de dangers et de surprises. Collectez des ressources pour fabriquer des objets et des structures qui correspondent ?? votre style de survie. Jouez en ??lucidant les myst??res d???un bien curieux pays.\r\n\r\nCoop??rez avec vos amis dans des parties priv??es, ou tentez votre chance avec des inconnus en ligne. Collaborez avec d???autres joueurs pour survivre dans un environnement rigoureux, ou d??battez-vous tout seul.\r\n\r\nFaites le n??cessaire, mais surtout : ne mourez pas de faim !',	'https://www.youtube.com/embed/bVbyn7c1X6E',	'../../uploads/don\'t starve.jpg',	2,	17,	1),
(25,	'Dysmantle',	'10tons Ltd',	'2021-11-16',	'2020-11-06',	'Alors que vous ??mergez de votre abri, apr??s d\'interminables ann??es, un monde nouveau, et pourtant vaguement familier, vous tend les bras. Un monde rempli de cr??atures affreuses, mais vide de tout autre ??tre humain, un monde o?? la nature cruelle a repris ses droits. Un monde sur le point de devenir plus terrifiant encore.',	'https://www.youtube.com/embed/1zbSFUROKYo',	'../../uploads/Dysmantle.jpg',	2,	1,	1),
(26,	'Escape Simulator',	'Pine Studio',	'2021-10-19',	'2021-10-19',	'Escape Simulator est un jeu d\'??nigmes ?? la premi??re personne, qui peut ??tre jou?? seul ou en ligne en mode co-op. Explorez un nombre grandissant de sc??nes hautement interactive d\'Escape rooms. D??placez les meubles, ramassez et examinez tout ce qui se trouve dans la pi??ce, cassez des vases et faites sauter des verrous! L\'??diteur de niveau supporte les sc??nes cr??ent par la communaut??.',	'https://www.youtube.com/embed/2VT7_tfRYV8',	'../../uploads/escape.jpg',	2,	3,	1),
(27,	'Euro Truck Simulator 2',	'SCS Software',	'2012-10-18',	'2012-10-18',	'Voyagez ?? travers l\'Europe en tant que roi de la route, un chauffeur routier qui livre d\'importantes cargaisons vers des destinations tr??s lointaines ! Avec des douzaines de villes ?? explorer du Royaume-Uni, de Belgique, d\'Allemagne, d\'Italie, des Pays-Bas, de Pologne et de bien d\'autres pays, votre endurance, vos talents et votre rapidit?? seront pouss??s dans leur retranchements. Si vous avez les capacit??s pour ??tre un pilote de poids-lourd d\'??lite, trouvez un volant et prouvez-le !',	'https://www.youtube.com/embed/xlTuC18xVII',	'../../uploads/eurotruck.jpg',	2,	17,	1),
(28,	'Firestone Idle RPG',	'Holyday Studios',	'2019-09-26',	'2019-09-26',	'Le jeu Firestone Idle RPG se situe dans le royaume fantastique d\'Alandria, o?? les forces mortes-vivantes des Orcs se rassemblent ?? nouveau pour semer le chaos sur le territoire. Cette fois, elles poss??dent la puissance titanesque des Firestones. Le roi vous a charg?? de former un groupe de h??ros afin de les arr??ter, de r??cup??rer les Firestones et de sauver le royaume.',	'https://www.youtube.com/embed/BgWBPxkmEIc',	'../../uploads/firestone.jpg',	1,	12,	1),
(29,	'The Forgotten City',	'Modern Storyteller',	'2021-07-28',	'2021-07-28',	'The Forgotten City est un jeu d\'aventure ??nigmatique m??lant exploration et d??duction. C\'est une version revisit??e du mod acclam?? par la critique qui a remport?? un prix national de la Writers\' Guild et qui a ??t?? t??l??charg?? plus de 3 millions de fois.\r\n\r\nLe combat est une option, mais la violence ne vous m??nera pas loin. Ce n\'est qu\'en interrogeant une communaut?? de personnages hauts en couleur, en exploitant intelligemment la boucle temporelle et en faisant des choix moraux difficiles que vous pourrez esp??rer r??soudre ce myst??re ??pique. Ici, vos d??cisions ont des cons??quences. Le destin de la cit?? est entre vos mains.',	'https://www.youtube.com/embed/zDF3VFaHSz0',	'../../uploads/forgotten.jpg',	2,	3,	1),
(30,	'House Flipper Garden DLC',	'Empyrean',	'2019-05-16',	'2019-05-16',	'Avez-vous d??j?? r??v?? de devenir jardinier ? Gr??ce ?? Garden Flipper DLC, c???est d??sormais possible !\r\nAvant de commencer ?? planter des arbres et des fleurs, vous devrez vous d??barrasser des ordures et des gravats.\r\nTondez la pelouse, coupez les arbres dont vous ne voulez plus, arrachez les mauvaises herbes et tracez des sentiers entre vos parterres de fleurs.\r\n\r\nR??alisez de toutes nouvelles missions et d??couvrez des m??caniques innovantes que nous avons con??ues en coop??ration avec des jardiniers professionnels !\r\nPas ?? pas, plongez dans le monde de la v??g??tation. Transformez des jardins d??sol??s en v??ritables ??uvres d\'art.\r\nEt quand vous serez pr??t ?? concevoir votre propre jardin???',	'https://www.youtube.com/embed/cI0ltZhefys',	'../../uploads/garden.jpg',	2,	17,	1),
(31,	'Gas Station Simulator',	'DRAGO entertainment',	'2021-09-15',	'2021-09-15',	'Gas Station Simulator consiste ?? r??nover, agrandir et g??rer une station-service au bord d\'une autoroute en plein d??sert. La libert?? de choix et de multiples approches pour g??rer votre entreprise et faire face ?? la pression sont les ingr??dients cl??s de ce jeu.',	'https://www.youtube.com/embed/VAg0R3EPDkw',	'../../uploads/gasStation.jpg',	2,	17,	1),
(32,	'Graveyard Keeper',	'Lazy Bear Games',	'2018-08-15',	'2018-08-15',	'Graveyard Keeper est la simulation de gestion de cimeti??re m??di??val la moins authentique de tous les temps ! Entretenez et d??veloppez votre cimeti??re, trouvez des moyens de r??duire les co??ts, diversifiez-vous dans d\'autres domaines d\'activit?? et utilisez les ressources ?? votre disposition. Une vraie aventure capitaliste : serez-vous capable de faire tout ce qui est n??cessaire pour d??velopper votre petite entreprise ? Il y a aussi une histoire d\'amour !',	'https://www.youtube.com/embed/GmZS6XFBJfQ',	'../../uploads/Graveyard.jpg',	3,	17,	1),
(33,	'Gunfire Reborn',	'Duoyi Games',	'2021-11-18',	'2020-05-05',	'Gunfire Reborn est un jeu d\'aventure divis?? en niveaux et m??lant jeu de tir ?? la premi??re personne, Roguelite et JDR. Les joueurs prennent le contr??le de h??ros poss??dant diverses comp??tences ?? combiner pour varier leur exp??rience. Ils peuvent se servir d\'armes trouv??es au hasard pour explorer des niveaux al??atoires. Vous pouvez jouer ?? ce jeu en solo ou en coop??ration (jusqu\'?? quatre joueurs).\r\n\r\nDans ce jeu, chaque niveau est g??n??r?? al??atoirement. ?? chaque nouveau d??part, vous profiterez d\'une toute nouvelle exp??rience. Vous d??couvrirez des talents de h??ros, des armes, des objets, des points de r??apparition et des rythmes de combat diff??rents, propres ?? chaque niveau.',	'https://www.youtube.com/embed/X7C7DhWbz98',	'../../uploads/gunfire.jpg',	2,	3,	1),
(34,	'Hades',	'Supergiant Games',	'2020-09-17',	'2019-12-10',	'Hades est un rogue-like en mode dungeon crawler qui associe le meilleur des titres de Supergiant salu??s par la critique. Il combine l\'action effr??n??e de Bastion, la profondeur et l\'atmosph??re tr??s riche de Transistor, ainsi que la narration centr??e sur les personnages qui caract??rise Pyre.',	'https://www.youtube.com/embed/91t0ha9x0AE',	'../../uploads/hades.jpg',	3,	1,	1),
(35,	'Hollow Knight Silksong',	'Team Cherry',	'2022-02-28',	'2022-02-28',	'Devenez la princesse chevalier\r\nIncarnez Hornet, la princesse protectrice d\'Hallownest, et partez ?? l\'aventure dans un tout nouveau royaume gouvern?? par la soie et le chant ! Captur??e et amen??e dans ce monde inconnu, Hornet doit combattre des ennemis et r??soudre des myst??res alors qu\'elle monte dans un p??lerinage mortel au sommet du royaume.\r\n\r\nHollow Knight: Silksong est la suite ??pique de Hollow Knight, l\'action-aventure prim??e. En tant que chasseur mortel Hornet, voyagez vers de toutes nouvelles terres, d??couvrez de nouveaux pouvoirs, combattez de vastes hordes d\'insectes et de b??tes et d??couvrez d\'anciens secrets li??s ?? votre nature et ?? votre pass??.',	'https://www.youtube.com/embed/yYgid2tsJFw',	'../../uploads/hollow knight.jpg',	3,	3,	1),
(36,	'House Builder',	'FreeMind S.A.',	'2021-11-11',	'2021-11-11',	'Ils disent qu\'un homme doit faire trois choses dans sa vie: planter un arbre, engendrer un fils et construire une maison.\r\nNous ne pouvons pas vous aider avec l\'arbre ni avec le fils, mais vous pouvez construire autant de maisons que vous le souhaitez en jouant ?? House Builder.\r\n\r\nDevenez un seul ??quipage de construction et construisez des maisons comme une simple hutte de boue africaine et aussi complexe qu\'une merveille architecturale d\'??conomie d\'??nergie super moderne.',	'https://www.youtube.com/embed/HCawWjFQjSw',	'../../uploads/house builder.jpg',	2,	17,	1),
(37,	'Hydroneer',	'Foulball Hangover',	'2020-05-08',	'2020-05-08',	'Hydroneer est un jeu bac ?? sable de minage o?? vous creusez pour trouver de l???or et d???autres ressources afin de construire d???imposantes machines et votre base d???op??rations. Commencez avec de simples outils puis d??veloppez de la machinerie hydraulique et des structures construites par vos soins pour miner et faire ??voluer davantage votre entreprise au sein d???un syst??me de progression riche.',	'https://www.youtube.com/embed/ZfGr4BZrbJQ',	'../../uploads/hydroneer.jpg',	2,	18,	1),
(38,	'Islanders',	'GrizzlyGames',	'2019-04-04',	'2019-04-04',	'Un petit mot des d??veloppeurs :\r\nTu r??ves de construire de magnifiques villes sans y passer trop de temps et sans stresse ? N???en dit pas plus ! ISLANDERS est fait pour toi.\r\n\r\nISLANDERS est un jeu strat??gique et minimaliste qui permet de construire ta propre ville sur diff??rentes ??les pleines de couleurs. Explore un nombre infini de nouveaux paysages, colonise les en cr??ant des villages qui deviendront de vastes villes, tout en profitant de ce moment de mani??re d??tendue.',	'https://www.youtube.com/embed/nnDWm9dpu3o',	'../../uploads/islanders.jpg',	2,	18,	1),
(39,	'I, Zombie',	'Awesome Games Studio',	'2014-12-09',	'2014-12-09',	'Un jeu de zombie pas comme les autres : cette fois, c\'est VOUS le zombie ! Dirigez votre horde de zombies, luttez pour votre libert?? et veillez ?? ce que les zombies r??gnent sur le monde !\r\n\r\nDans I, Zombie, vous jouez le chef d\'une horde de zombies. Votre objectif est de contaminer tous les humains pr??sents sur la carte. Chaque humain infect?? se transforme en zombie, rejoint votre horde... et peut ??tre envoy?? contre des soldats bien arm??s. Vous pouvez commander ?? votre horde d\'attaquer des ennemis, de vous suivre ou d\'attendre vos ordres. Soyez fin strat??ge et ??laborez des plans d\'action solides afin de remporter la victoire dans chaque sc??nario.',	'https://www.youtube.com/embed/aCPD5wCufpI',	'../../uploads/izombie.jpg',	1,	18,	1),
(40,	'Judgment  simulateur de survie',	'Suncrash',	'2018-05-03',	'2018-05-03',	'Reconstruisez la soci??t??. Survivez ?? l\'apocalypse.\r\n\r\nJudgment: Apocalypse Survival Simulation est un jeu de simulation de colonie proposant des combats tactiques au beau milieu d\'une apocalypse d??moniaque. Les portes de l\'enfer se sont ouvertes, lib??rant des d??mons sans piti?? sur notre monde. Mais vous pouvez vous venger ! Guidez un groupe de survivants ?? travers ce chaos en ??vitant des cr??atures infernales et en construisant un sanctuaire. Survivez en r??coltant des ressources, en fabriquant de l\'??quipement, en d??fendant votre base et en envoyant des ??quipes piller des provisions. Recherchez les technologies humaines et utilisez les arts mal??fiques pour trouver un moyen de renvoyer les d??mons en enfer.\r\n\r\nLa victoire d??pend de votre survie. Survivrez-vous au jugement dernier ?',	'https://www.youtube.com/embed/FuNRNHS830w',	'../../uploads/judgment.jpg',	1,	19,	1),
(41,	'Kenshi',	'Lo Fi Games',	'2018-12-06',	'2018-12-06',	'Un RPG en escouade dans un monde ouvert, avec un gameplay de type sandbox plut??t qu???une histoire lin??aire. Vous pourrez y ??tre un marchand, un voleur, un rebelle, un chef de guerre, un aventurier, un fermier, un esclave??? ou juste de la nourriture pour cannibales.\r\n\r\nRecherchez du mat??riel et fabriquez de nouveaux ??quipements. Achetez et am??liorez vos propres b??timents. Faites-en des abris fortifi??s o?? vous r??fugier quand les choses tournent mal, ou utilisez-les pour d??marrer une activit??. Aidez ou combattez les diverses factions existant dans le monde tout en veillant ?? conserver assez de forces et de richesse??? Vous en aurez besoin pour survivre dans ce d??sert impitoyable. Entra??nez vos hommes au combat pour qu???ils passent du statut de fr??les victimes ?? celui de ma??tres guerriers. Portez les bless??s de votre escouade pour les mettre en s??curit?? et les ramener vivants ?? la base.',	'https://www.youtube.com/embed/GWj4h_Q0Dxc',	'../../uploads/kenshi.jpg',	2,	18,	1),
(42,	'Kingdom Wars 2 Definitive Edition',	'Reverie World Studios',	'2019-07-09',	'2019-07-09',	'Kingdom Wars 2: Definitive Edition est un jeu de strat??gie en temps r??el dans un monde de dark fantasy peupl?? d\'Orcs, d\'Elfes et de Dragons m??lant survie, fabrication sur le long terme, construction de villes complexes au rythme haletant et combats d\'escarmouche qui transforment les paysages en champs de bataille immacul??s de sang.',	'https://www.youtube.com/embed/_zPy2alPCe4',	'../../uploads/kingdom.jpg',	2,	18,	1),
(43,	'Len\'s Island',	'Flow Studio',	'2021-11-26',	'2021-11-26',	'Vous ??tes nouveau en ville, avec seulement les outils dans votre sac ?? dos et une attitude positive, vous construisez une nouvelle vie pour vous-m??me sur la magnifique ??le voisine.\r\nD??couvrez les sombres secrets que rec??le l\'??le en vous aventurant plus profond??ment dans les grottes pour rechercher ce que les voyageurs du pass?? ont recherch??.\r\n\r\nLen\'s Island est un m??lange de construction paisible, d\'agriculture et d\'artisanat, m??lang?? ?? des combats intenses, des batailles de donjons et de l\'exploration.',	'https://www.youtube.com/embed/zDFu5p27g4E',	'../../uploads/lensIsland.jpg',	2,	3,	1),
(44,	'Little Inferno',	'Tomorrow Corporation',	'2012-11-19',	'2012-11-19',	'*** Plus de 1 million de copies vendues! ***\r\nF??licitations pour l\'achat de votre Foyer de divertissement Little Inferno ! Jetez vos jouets dans le feu et jouez avec eux pendant qu\'ils br??lent. Restez bien au chaud ?? l\'int??rieur. Aussi loin que l\'on se souvienne, il neige dehors !\r\n\r\nBr??lez des b??ches, des robots hurlants, des cartes de cr??dit, des piles, des poissons explosifs, des dispositifs nucl??aires instables, et des galaxies miniatures. Une aventure prenant place presque enti??rement devant une chemin??e - en regardant l??-haut l??-haut l??-haut par le conduit, tandis qu\'un monde gel?? se trouve juste de l\'autre c??t?? du mur.',	'https://www.youtube.com/embed/-0TniR3Ghxc',	'../../uploads/little.jpg',	1,	3,	1),
(45,	'Logic World',	'Mouse Hat Games',	'2021-10-22',	'2021-10-22',	'Logic World est un simulateur de circuit pas comme les autres. Plongez dans un monde lumineux et color?? en construisant des circuits en 3D du point de vue de la premi??re personne. D??couvrez la magie et les merveilles de la logique num??rique et d??veloppez vos comp??tences en construisant des machines d\'une complexit?? et d\'une grandeur croissantes.',	'https://www.youtube.com/embed/h7pT89D4SPI',	'../../uploads/LogicWorld.jpg',	2,	17,	1),
(46,	'House Flipper Luxury DLC',	'Empyrean, Frozen Way',	'2021-10-14',	'2021-10-14',	'Fini les petites maisons avec des dizaines de petites pi??ces : c\'est la taille qui compte !\r\nDes verri??res, de grandes baies vitr??es ?? la place des murs et un plafond qui fait deux fois votre taille, c\'est comme ??a que vivent les rois !\r\nR??novez des immeubles d??labr??s et de vieux b??timents industriels tels que des usines, de grands centres commerciaux et des entrep??ts, et transformez-les en appartements de luxe.',	'https://www.youtube.com/embed/78hXuSOYhsk',	'../../uploads/luxury.jpg',	2,	17,	1),
(47,	'Melvor Idle',	'Games by Malcs',	'2021-05-18',	'2020-11-20',	'Inspir?? de RuneScape, Melvor Idle a pris tous les ??l??ments qui rendent les jeux d\'aventure si captivants pour les r??duire ?? leur forme la plus pure !\r\n\r\nMa??trisez les nombreuses comp??tences runescapiennes de Melvor d\'un simple clic ou du bout du doigt. Melvor Idle est un jeu incr??mental riche en fonctionnalit??s qui associe une atmosph??re clairement famili??re ?? une exp??rience de jeu neuve. Il n\'a jamais ??t?? aussi relaxant de ma??triser plus de 20 comp??tences ! Que vous soyez un petit nouveau ou un v??t??ran aguerri du monde de RuneScape, ou si vous cherchez simplement une aventure riche mais accessible qui convient ?? votre rythme de vie effr??n??, Melvor est une exp??rience inactive ?? aucune autre pareille.',	'https://www.youtube.com/embed/pYb18HD79_A',	'../../uploads/melvor.jpg',	1,	12,	1),
(48,	'Nimbatus  The Space Drone Constructor',	'Stray Fawn Studio',	'2020-05-14',	'2020-05-14',	'Vous ??tes le Capitaine du Nimbatus ??? la plus grosse usine mobile de drones jamais con??ue. Concevez vos propres drones pour explorer un univers physiquement simul??. Survivez dans diff??rents biomes en cr??ant des passages ?? l\'aide de vos armes au travers de plan??tes compl??tement destructibles, mesurez vous aux drones autonomes construits par d\'autres joueurs ou profitez d\'une totale libert?? cr??ative dans le bac ?? sable.',	'https://www.youtube.com/embed/VE7-gdy8iec',	'../../uploads/nimbatus.jpg',	1,	1,	1),
(49,	'Nine Parchments',	'Frozenbyte',	'2017-12-05',	'2017-12-05',	'Nine Parchments est un jeu d\'action et de magie en coop??ration d??velopp?? par Frozenbyte, les cr??ateurs de la s??rie Trine !\r\n\r\nDes apprentis sorciers partent en qu??te des 9 parchemins pour compl??ter leurs grimoires.\r\n\r\nComme ils obtiennent vite de puissants sorts sans m??moriser les mesures de s??curit?? ad??quates, leur progression d??clenche toutes sortes d\'accidents mortels...\r\n\r\nNine Parchments combine des ??l??ments d\'action - des sorts ?? lancer en temps r??el - et de RPG, comme l\'am??lioration du personnage, la collecte de butins magiques et de myriades d\'objets : chapeaux, puissants b??tons.',	'https://www.youtube.com/embed/q1_KvNib1RI',	'../../uploads/nine.jpg',	2,	1,	1),
(50,	'Noita',	'Nolla Games',	'2020-10-15',	'2019-09-24',	'Noita est un roguelite d\'action magique dans un monde o?? chaque pixel est simul?? physiquement. Combattez, explorez, faites fondre, br??lez, gelez et ??vaporez tout sur votre chemin ?? travers le monde proc??dural ?? l\'aide de sorts que vous aurez cr????s vous-m??me. Explorez une grande vari??t?? d\'environnements allant des mines de charbon aux d??serts de glace, et enfoncez-vous plus profond??ment ?? la recherche de myst??res inconnus.',	'https://www.youtube.com/embed/0cDkmQ0F0Jw',	'../../uploads/noita.jpg',	3,	12,	1),
(51,	'Northgard',	'Shiro Games',	'2018-03-07',	'2018-03-07',	'Apr??s des ann??es d\'exploration forcen??e, de courageux Vikings d??couvrirent un nouveau continent recelant bien des myst??res, dangers et tr??sors : Northgard.\r\n\r\nLes plus t??m??raires hiss??rent alors les voiles et partirent ?? la conqu??te de ces terres inexplor??es, en qu??te de gloire pour leur clan. Par leurs victoires, leur aptitude au commerce ou leur d??votion aux Dieux, ils graveront ainsi leurs noms dans l\'histoire.\r\n\r\nMais il leur faudra pour cela combattre les loups f??roces et guerriers morts-vivants qui arpentent ces terres, vaincre des g??ants colossaux ou s\'allier ?? eux, et survivre aux hivers les plus rigoureux que le Nord ait connus.',	'https://www.youtube.com/embed/mDN8PHOYnKc',	'../../uploads/northgard.jpg',	2,	18,	1),
(52,	'Outer Wilds',	'Mobius Digital',	'2020-06-18',	'2020-06-18',	'Nomm?? Game of the Year 2019 par Giant Bomb, Polygon, Eurogamer et The Guardian, acclam?? par la critique et r??compens?? par de nombreux prix, Outer Wilds est un jeu myst??rieux en monde ouvert, mettant en sc??ne un syst??me solaire pi??g?? dans une boucle temporelle infinie.\r\n\r\nBienvenue dans le programme spatial !\r\nVous ??tes la nouvelle recrue de Outer Wilds Ventures, un r??cent programme spatial qui enqu??te sur un ??trange syst??me solaire en ??volution permanente.\r\n\r\nLes myst??res du syst??me solaire...\r\nQu\'est-ce qui se cache au c??ur du sinistre Dark Bramble ? Qui a b??ti les ruines extraterrestres sur la Lune ? Est-il possible de stopper la boucle temporelle infinie ? Des r??ponses vous attendent dans les ??tendues spatiales les plus dangereuses.',	'https://www.youtube.com/embed/d6LGnVCL1_A',	'../../uploads/outer.jpg',	2,	1,	1),
(53,	'Overcooked! 2',	'Ghost Town Games Ltd., Team17',	'2018-08-07',	'2018-08-07',	'Overcooked revient avec une toute nouvelle portion d\'action culinaire chaotique ! Retournez dans le royaume Oignon et r??unissez votre ??quipe de chefs dans ce jeu de coop??ration locale ou en ligne jusqu\'?? 4 joueurs. ?? vos tabliers... il est l\'heure de sauver le monde (encore une fois !)',	'https://www.youtube.com/embed/gEjbXb_eZcs',	'../../uploads/overcooked.jpg',	2,	1,	1),
(54,	'Oxygen Not Included',	'Klei Entertainment',	'2019-07-30',	'2019-07-30',	'Dans le jeu de simulation de colonie spatiale Oxygen Not Include, vous d??couvrirez que les p??nuries d\'oxyg??ne, de chaleur et de subsistance sont des menaces constantes pour la survie de votre colonie. Guidez les colons ?? travers les p??rils de la vie souterraine sur les ast??ro??des et observez leur population cro??tre jusqu\'?? ce qu\'ils ne se contentent pas de survivre, mais de prosp??rer...',	'https://www.youtube.com/embed/wcLayGm_pM4',	'../../uploads/oxygen.jpg',	3,	17,	1),
(55,	'Papers, Please',	'Lucas Pope',	'2013-08-08',	'2013-08-08',	'F??licitations !\r\nVotre nom a ??t?? s??lectionn?? lors de la loterie du Minist??re du Travail du mois d\'octobre.\r\nPour prendre vos fonctions, pr??sentez-vous imm??diatement au Minist??re des Admissions du poste-fronti??re de Grestin.\r\nUn appartement de classe 8 vous a ??t?? affect?? ?? Grestin Est. Vous pourrez vous y installer avec votre famille.\r\nGloire ?? l\'Arstotzka.\r\n\r\n\r\nL\'??tat communiste d\'Arstotzka vient de mettre fin ?? 6 ann??es de guerre contre son voisin, la Kol??chie, r??cup??rant ainsi le secteur de la ville fronti??re de Grestin qui lui revient de mani??re l??gitime.\r\n\r\nVotre t??che, en tant qu\'Inspecteur du service de l\'Immigration, est de contr??ler le flux de personnes d??sirant p??n??trer sur le territoire arstotzke depuis la Kol??chie. Parmi la multitude d\'immigrants et de visiteurs ?? la recherche de travail, se cachent contrebandiers, espions et terroristes.\r\n\r\nMuni uniquement des documents pr??sent??s par les voyageurs et de l\'??quipement rudimentaire d\'inspection, de fouille et de v??rification des empreintes digitales fourni par le Minist??re des Admissions, c\'est ?? vous de d??cider qui recevra l\'autorisation d\'entrer en Arstotzka et qui sera refoul??, voire mis en ??tat d\'arrestation.',	'https://www.youtube.com/embed/_QP5X6fcukM',	'../../uploads/paper.jpg',	3,	3,	1),
(56,	'Project Winter',	'Other Ocean Interactive',	'2019-05-23',	'2019-05-23',	'Trahissez vos amis dans ce multijoueur de 8 personnes concentr??es sur la tromperie sociale et la survie.\r\n\r\nLa communication et le travail d?????quipe sont essentiels au but ultime de l?????vasion des survivants. Rassemblez des ressources, r??parez les structures et bravez la nature sauvage ensemble. Attention, il y a des tra??tres au sein du groupe qui gagneront de la force au fur et ?? mesure que le match avance. Le seul objectif des tra??tres est d???arr??ter les survivants par tous les moyens possibles.',	'https://www.youtube.com/embed/kcX_clkApRo',	'../../uploads/project.jpg',	2,	18,	1),
(57,	'Rebel Inc: Escalation',	'Ndemic Creations',	'2021-10-13',	'2019-10-15',	'Le cr??ateur de Plague Inc: Evolved signe un jeu de simulation politique/militaire strat??gique unique et captivant.\r\n\r\nDans Rebel Inc: Escalation, la guerre est \"termin??e\", mais on sait tous que ??a ne veut rien dire. Afin de stabiliser un pays ravag?? par la guerre, vous devez trouver le bon ??quilibre entre priorit??s militaires et civiles pour plaire au peuple, tout en emp??chant une force insurrectionnelle de s\'emparer du pouvoir !',	'https://www.youtube.com/embed/L-Zwh1dRauA',	'../../uploads/RebelInc.jpg',	1,	18,	1),
(58,	'Risk of Rain 2',	'Hopoo Games',	'2020-08-11',	'2019-03-28',	'SURVIVEZ ?? UNE PLAN??TE EXTRATERRESTRE\r\nPlus d\'une dizaine d\'environnements r??alis??s ?? la main vous attendent, tous remplis de monstres mena??ants et de boss titanesques qui n\'ont qu\'un seul but : vous ??liminer. Frayez-vous un chemin jusqu\'au boss final et ??chappez-vous ou bien continuez votre partie ind??finiment pour voir combien de temps vous arriverez ?? survivre. Gr??ce ?? un syst??me de progression ??volutive unique, vous et vos adversaires gagnez en puissance de mani??re continue tout au long d\'une partie.',	'https://www.youtube.com/embed/Qwgq_9EOCTg',	'../../uploads/risk.jpg',	2,	1,	1),
(59,	'Rogue Fable III',	'Pixel Forge Games',	'2021-12-22',	'2018-12-28',	'La l??gendaire coupe de Yendor, certains disent qu\'elle conf??re l\'immortalit??, mais d\'autres disent que son pouvoir infini vous conduira ?? la folie. R??put?? ??tre en or massif, incrust?? de pierres pr??cieuses d\'une beaut?? et d\'une taille incroyables, il rapportera s??rement une fortune sur le march?? noir. De nombreux voleurs et sc??l??rats, attir??s par des r??ves de richesses sans fin, ont d??cid?? de voler l\'artefact illusoire dans les profondeurs du Donjon de l\'Effroi. Aucun n\'a surv??cu, serez-vous le premier ?? r??ussir ?\r\n\r\nRogue Fable III capture le d??fi, la tactique, la profondeur et la complexit?? des roguelikes classiques, mais avec une interface moderne qui minimise la courbe d\'apprentissage pour les nouveaux joueurs et permet aux fans v??t??rans de roguelike de se mettre rapidement ?? niveau. Le jeu a ??t?? con??u pour ??tre gagnable en moins d\'une heure tout en conservant le gameplay profond et la richesse du contenu pour lesquels le genre est c??l??bre. Bien que parfois tr??s difficile, chaque course est finalement gagnable et constitue un v??ritable test des comp??tences et des connaissances des joueurs.',	'https://www.youtube.com/embed/iT_KE_N9G4Q',	'../../uploads/rogue.jpg',	3,	12,	1),
(60,	'Ruined King: A League of Legends Story???',	'Airship Syndicate',	'2021-11-16',	'2021-11-16',	'Dressez-vous contre la Ruine\r\nContr??lez un groupe de champions de League of Legends, explorez Bilgewater et naviguez jusqu\'aux ??les obscures pour d??couvrir ce que cache la Brume noire.\r\n\r\nD??velopp?? par Airship Syndicate et le l??gendaire Joe Madureira d??veloppeur et dessinateur de bandes dessin??es (aussi cr??ateurs de Battle Chaser et Darksiders), Ruined King: A League of Legends Story??? est le premier jeu Riot Forge qui vous permette d\'explorer l\'univers de League of Legends. Dans ce jeu de r??le immersif au tour par tour, vous aurez la possibilit?? de former votre ??quipe et de prendre le contr??le de plusieurs champions de League of Legends. Explorez la tumultueuse Bilgewater et les myst??rieuses ??les obscures, et d??couvrez le syst??me d\'initiative des voies.',	'https://www.youtube.com/embed/eUkyg3sUdWc',	'../../uploads/RuinedKing.jpg',	2,	12,	1),
(61,	'Five Nights at Freddy\'s: Security Breach',	'Steel Wool Studios',	'2021-12-17',	'2021-12-17',	'LE PROCHAIN CHAPITRE DE L???HORREUR\r\n\r\nFive Nights at Freddy???s: Security Breach est le dernier volet de la franchise vid??oludique horrifique adul??e par des millions de joueurs ?? travers le monde. Incarnez Gregory, un jeune homme coinc?? pour la nuit dans le Freddy Fazbear???s Mega Pizzaplex. Avec l???aide de Freddy Fazbear en personne, Gregory doit survivre et ??chapper aux personnages de Five Nights at Freddy???s (r??invent??s et rejoints par de toutes nouvelles menaces effroyables) qui le traquent sans rel??che.',	'https://www.youtube.com/embed/Wz_MPpsC2xw',	'../../uploads/security.jpg',	2,	1,	1),
(62,	'Settlement Survival',	'Gleamer Studio',	'2021-10-11',	'2021-10-11',	'Dirigez votre peuple dans la cr??ation d\'une nouvelle colonie dans ce survival city-builder. Vous devrez fournir ?? vos citoyens un logement, garantir l\'approvisionnement alimentaire, les prot??ger contre les menaces de la nature, assurer leur bien-??tre et leur bonheur et g??rer l\'??ducation et l\'emploi. Si vous r??ussissez, vous pourrez m??me attirer des habitants de villes ??trang??res !',	'https://www.youtube.com/embed/M9svPXtSjsI',	'../../uploads/SettlementSurvival.jpg',	2,	17,	1),
(63,	'Shakes and Fidget',	'Playa Games GmbH',	'2016-02-24',	'2016-02-24',	'Shakes et Fidget est un RPG fantasy amusant et satyrique, et a m??me ??t?? r??compens?? ! Tu n\'en reviens pas ? Plus de 50 millions de joueurs ont fait de SFGAME l\'un des jeux en ligne les plus populaires au monde !\r\n\r\n* marque nouvelle mise ?? jour de la strat??gie \"La Forteresse\" et une interface enti??rement repens??e *\r\n\r\nPersonnalise ton propre h??ros de bande dessin??e et hisse-toi au sommet du Panth??on ! L\'ar??ne JcJ ne se gagnera s??rement pas toute seule avec de vrais joueurs ?? combattre ! Tes compagnons de guilde t\'aideront ?? devenir plus fort, plus invincible et ?? trouver plus de butin ??pique ! Accepte les qu??tes, lance-toi dans des aventures grisantes, monte de niveau, amasse de l\'or, gagne de l\'honneur, sois surpuissant et deviens une l??gende vivante !',	'https://www.youtube.com/embed/Og6jldIdul4',	'../../uploads/shakes.jpg',	1,	12,	1),
(64,	'Shovel Knight: Treasure Trove',	'Yacht Club Games',	'2014-06-26',	'2014-06-26',	'Shovel Knight: Treasure Trove est l?????dition int??grale et compl??te de Shovel Knight, un classique ??bouriffant du jeu d\'action/aventure, dot?? d\'une jouabilit?? impressionnante et de personnages m??morables, le tout servi par une esth??tique r??tro 8 bits. Incarnez Shovel Knight, le chevalier ?? l?????pelle, et courez, sautez, et combattez afin de l\'aider dans sa qu??te pour retrouver sa bien-aim??e ! Terrassez les m??prisables chevaliers de l???Ordre des Sans Quartier et leur mena??ante ma??tresse, l???Enchanteresse !',	'https://www.youtube.com/embed/bhG02JG7Sns',	'../../uploads/shovel.jpg',	3,	3,	1),
(65,	'Slay the Spire',	'Mega Crit Games',	'2019-01-23',	'2019-01-23',	'En fusionnant les jeux de cartes avec les roguelikes, nous sommes arriv??s ?? cr??er le jeu de cartes solo le plus int??ressant possible. Construisez votre deck, rencontrez toutes sortes d\'ennemis bizarres, d??couvrez des reliques aux pouvoirs immenses, et ??radiquez la tour!',	'https://www.youtube.com/embed/NHRpS2DzIAI',	'../../uploads/slay.jpg',	1,	18,	1),
(66,	'Space Haven',	'Bugbyte Ltd.',	'2020-05-21',	'2020-05-21',	'Embarquez pour l\'espace avec un ??quipage de colons en qu??te d\'un nouveau foyer. Cr??ez vos vaisseaux tuile par tuile, optimisez le flux et la qualit?? de l\'air, g??rez les besoins et l\'humeur de votre ??quipage, rencontrez-en d\'autres, et explorez le cosmos dans ce simulateur de colonie spatiale.',	'https://www.youtube.com/embed/va7XjJk-05o',	'../../uploads/space haven.jpg',	3,	17,	1),
(67,	'Spellcaster University',	'Sneaky Yak Studio',	'2021-06-15',	'2019-09-24',	'Dans Spellcaster University, vous endossez le r??le du directeur d\'une universit?? de magie dans un monde d\'heroic fantasy haut en couleur. B??tissez votre ??cole, g??rez v??tre budget, recrutez des professeurs. En ferez vous un haut lieu de la magie noire, avec les meilleurs professeurs de n??cromancie et de d??monologie? Ou un lieu en harmonie avec la nature pour entra??ner druides et shamans? Ou pourquoi ne pas former des mages aventuriers, en leur proposant des options pour apprendre ?? se battre et ?? ??tre discrets? Mais il faudra pour cela survivre aux impitoyables attaques des tribus orcs et aux contr??les du rectorat.',	'https://www.youtube.com/embed/NcsJO_JPSbY',	'../../uploads/spellcaster.jpg',	2,	18,	1),
(68,	'Spiritfarer??: ??dition Farewell',	'Thunder Lotus Games',	'2020-08-18',	'2020-08-18',	'Spiritfarer?? est un jeu de gestion cosy sur le th??me de la mort, dans lequel vous incarnez Stella la Navigatrice, une passeuse d?????mes. Construisez un bateau pour explorer le monde, puis liez-vous d???amiti?? avec les esprits et prenez soin d???eux avant de les mener vers l???au-del??. Cultivez, prospectez, p??chez, r??coltez, cuisinez et fabriquez tout ce dont vous aurez besoin pour traverser des mers mystiques. Vous pouvez ??galement incarner Daffodil le chat pour une aventure en mode coop??ratif ?? deux joueurs. Partagez des moments privil??gi??s avec vos d??funts passagers, fa??onnez des souvenirs inoubliables et apprenez comment dire adieu ?? vos chers amis.\r\n\r\nL\'??dition Farewell de Spiritfarer est l\'??dition d??finitive du jeu prim?? de gestion cosy sur le th??me de la mort. Elle inclut le jeu de base tant ador?? par pr??s de 1 million de joueurs, et tous les contenus suppl??mentaires publi??s ?? ce jour. D??couvrez pourquoi la critique a d??sign?? Spiritfarer comme l\'un des meilleurs jeux de 2020.',	'https://www.youtube.com/embed/j8Aj3QFQLjQ',	'../../uploads/spirit.jpg',	1,	3,	1),
(69,	'Stardew Valley',	'ConcernedApe',	'2016-02-26',	'2016-02-26',	'Vous avez h??rit?? de l\'ancienne ferme de votre grand-p??re ?? Stardew Valley. Arm?? d\'outils usag??s et de quelques pi??ces de monnaie, vous vous appr??tez ?? commencer votre nouvelle vie. Pouvez-vous apprendre ?? vivre de la terre et transformer ces champs envahis en une maison prosp??re ? Ce ne sera pas facile. Depuis que Joja Corporation est arriv??e en ville, les anciens modes de vie ont pratiquement disparu. Le centre communautaire, autrefois le centre d\'activit?? le plus dynamique de la ville, est maintenant en ruine. Mais la vall??e semble pleine d\'opportunit??s. Avec un peu de d??vouement, vous pourriez bien ??tre celui qui restaurera la grandeur de Stardew Valley !',	'https://www.youtube.com/embed/LiWYo-2bq4M',	'../../uploads/stardiewValley.jpg',	3,	17,	1),
(70,	'Steel Division 2',	'Eugen Systems',	'2019-06-20',	'2019-06-20',	'Steel Division 2 repousse les limites du jeu de strat??gie en temps r??el. Se d??roulant sur le Front de l\'Est en 1944, cette suite de Steel Division: Normandy 44, encens?? par la critique, vous place aux commandes de toute votre arm??e durant l\'Op??ration Bagration, l\'offensive men??e par les Sovi??tiques contre les arm??es nazies en Bi??lorussie.\r\n\r\nIncarnez un G??n??ral dans des Campagnes Strat??giques Dynamiques au tour par tour ?? l\'??chelle 1:1, glissez-vous dans la peau d\'un Colonel pour des batailles ??piques en temps r??el ou devenez un Expert en Armement gr??ce au tout nouveau syst??me de cr??ation de Decks.\r\n\r\nAvec plus de 600 unit??s, 25 cartes tactiques, et de nombreux modes de jeu, Steel Division 2 vous offre une totale libert?? d\'action et des heures et des heures de jeu en solo, coop, ou en multijoueur en ligne.',	'https://www.youtube.com/embed/TgFrXX84Tu8',	'../../uploads/steel.jpg',	2,	18,	1),
(71,	'Stoneshard',	'Ink Stains Games',	'2020-02-06',	'2020-02-06',	'Stoneshard est un RPG au tour par tour stimulant qui se d??roule dans un monde ouvert. D??couvrez la vie impitoyable d\'un mercenaire m??di??val : voyagez ?? travers le royaume d??chir?? par la guerre, remplissez des contrats, combattez, soignez vos blessures et d??veloppez votre personnage sans aucune restriction.',	'https://www.youtube.com/embed/xwPAr4V3oK0',	'../../uploads/stoneshard.jpg',	3,	12,	1),
(72,	'Surviving the Aftermath',	'Iceflake Studios',	'2021-11-16',	'2020-10-22',	'Survivez et prosp??rez dans un avenir post-apocalyptique : les ressources sont rares, mais les possibilit??s, infinies! Construisez une colonie ?? l\'??preuve des catastrophes, prot??gez vos colons et restaurez la civilisation dans un monde d??vast??.\r\n\r\nQuittez votre colonie et explorez des territoires d??sol??s pour r??cup??rer des ressources, rencontrer des colonies rivales et d??couvrir des secrets.',	'https://www.youtube.com/embed/HpNIK_e5qy0',	'../../uploads/surviving.jpg',	1,	19,	1),
(73,	'Totally Accurate Battle Simulator',	'Landfall',	'2021-04-01',	'2019-04-01',	'Dirigez des personnages flageolants bleus et rouges venant de terres anciennes, de lieux effrayants et de mondes fantastiques. Admirez-les se battre dans des simulations o?? la physique est totalement bancale.\r\n\r\nSi vous finissez par en avoir marre des plus de 100 personnages ?? votre disposition, vous pouvez toujours en cr??er des nouveaux dans le cr??ateur d\'unit??.\r\n\r\nVous pouvez ??galement envoyer vos personnages se battre contre vos amis ou des inconnus dans le mode multijoueur en ligne!',	'https://www.youtube.com/embed/ah6OVetEmFQ',	'../../uploads/tabs.jpg',	2,	18,	1),
(74,	'Tavern Master',	'Untitled Studio, WhisperGames',	'2021-11-16',	'2021-11-16',	'Concevez et construisez votre propre taverne m??di??vale !\r\nTavern Master est un jeu de gestion de taverne m??di??vale o?? vous ??tes en charge de la construction, de l\'entretien et de la gestion de votre propre taverne !\r\n\r\nAchetez des tables et des bancs, remplissez des barils de boissons, embauchez du personnel et vous serez pr??t ?? servir vos premiers clients. Assurez-vous que vos employ??s sont heureux, qu\'il y a assez de boissons et de places pour les clients et bient??t vous pourrez d??velopper votre entreprise de diff??rentes mani??res.',	'https://www.youtube.com/embed/yfbvHntRTX0',	'../../uploads/TavernMaster.jpg',	2,	17,	1),
(75,	'Terraria',	'Re-Logic',	'2011-05-16',	'2011-05-16',	'Creuser, survivre, explorer, construire ! Tout est possible dans ce jeu d\'aventure bourr?? d\'action. Le monde est votre toile et le sol votre peinture.\r\nPrenez vos outils, et c\'est parti ! Fabriquez des armes pour lutter contre toutes sortes d\'ennemis. Creusez en profondeur pour trouver des accessoires, de l\'argent et plein d\'autres objets qui pourront vous ??tre utiles. Partez ?? la recherche de mat??riaux pour fabriquer tout ce qu\'il vous faut pour cr??er votre propre monde. Construisez une maison, un fort ou pourquoi pas un ch??teau. Des gens s\'installeront et vendront peut-??tre m??me leurs services pour vous aider dans votre voyage.\r\nAttention, ce n\'est pas tout, d\'autres d??fis vous attendent... ??tes-vous pr??t ?? vous retrousser les manches ?',	'https://www.youtube.com/embed/w7uOhFTrrq0',	'../../uploads/terraria.jpg',	3,	12,	1),
(76,	'Townscaper',	'Oskar St??lberg',	'2021-08-26',	'2020-06-30',	'Construisez des villes pittoresques avec des rues sinueuses. Construisez de petits hameaux, des cath??drales planantes, des r??seaux de canaux ou des villes c??lestes sur des pilotis. Bloc par bloc.\r\n\r\nAucun but. Ni de vrai gameplay. Juste beaucoup de b??timents et beaucoup de beaut??. C\'est tout.\r\n\r\nTownscaper est un projet de passionn?? exp??rimental. Plus un jouet qu\'un jeu vid??o. Choisissez des couleurs dans la palette, d??truisez des blocs de maison color??s sur la grille irr??guli??re et regardez l\'algorithme sous-jacent de Townscaper transformer automatiquement ces blocs en de jolies petites maisons, arches, escaliers, ponts et arri??re-cours luxuriantes, selon leur configuration',	'https://www.youtube.com/embed/QtVkteAS15M',	'../../uploads/town.jpg',	2,	17,	1),
(77,	'Tribes of Midgard',	'Norsfell',	'2021-07-27',	'2021-07-27',	'Saison 2 : la Saga du Serpent est disponible et vous forcera, votre tribu et vous, ?? affronter les dangers des mers inexplor??es ! Voguez vers de nouveaux horizons afin de d??couvrir des ??les in??dites et d\'affronter leurs f??roces habitants. Mais prenez garde... un nouveau Boss de Saga vous attend si vous r??ussissez ?? percer les secrets de son antre. ??quipez de nouvelles runes puissantes, brandissez fi??rement vos nouvelles armes et armures et mettez ?? profit vos nouveaux talents de nageur pour relever ces nouveaux d??fis et remporter les r??compenses de cette saison in??dite !',	'https://www.youtube.com/embed/FpNeJP2SAJU',	'../../uploads/tribes.jpg',	2,	3,	1),
(78,	'Trine Enchanted Edition',	'Frozenbyte',	'2009-07-02',	'2009-07-02',	'Trine est un jeu de r??flexion o?? le joueur peut cr??er et utiliser des objets pour r??soudre des ??nigmes et combattre des ennemis. Le jeu se d??roule dans un environnement de ch??teaux-forts o?? trois h??ros sont li??s par le Trine pour d??livrer le royaume du mal .\r\nLe jeu est bas?? sur des interactions physiques virtuelles. Chaque personnage dispose de pouvoirs sp??ciaux pour lutter contre les arm??es de zombies et les nombreux pi??ges. Le joueur peut choisir le personnage qui conviendra le mieux pour chaque ??preuve. Le magicien peut faire des invocations et cr??er de nouveaux chemins, le voleur peut utiliser son agilit?? et sa pr??cision et le chevalier peut utiliser son pouvoir destructeur et sa force pour assurer la victoire.',	'https://www.youtube.com/embed/H4sMJdAP2-4',	'../../uploads/trine.jpg',	2,	1,	1),
(79,	'Trine 2: Complete Story',	'Frozenbyte',	'2013-06-06',	'2013-06-06',	'Trine 2 est un jeu d\'action, d\'??nigmes et de plateforme ?? d??filement horizontal o?? vous incarnez l\'un des Trois H??ros qui tracent leur chemin ?? travers d\'innombrables dangers, dans un univers fantastique de conte de f??e.',	'https://www.youtube.com/embed/-6lYPZ27C4c',	'../../uploads/trine2.jpg',	2,	1,	1),
(80,	'Undying',	'Vanimals',	'2021-10-19',	'2021-10-19',	'Infect??e par une morsure de zombie, les jours d\'Anling sont compt??s. Elle doit d??sormais se battre pour survivre, pas pour elle-m??me, mais pour son jeune fils, Cody. Garantissez la survie de Cody dans un monde infest?? de zombies, en le prot??geant et en lui apprenant des comp??tences pr??cieuses.\r\n\r\nDans ce jeu de survie ??mouvant, incarnez Anling dont le but est de s\'assurer que son fils, Cody, soit en s??curit?? et puisse vivre apr??s sa transformation. Vous devrez g??rer des ressources limit??es afin de ralentir l\'infection d\'Anling tout en faisant en sorte qu\'elle et Cody ne meurent pas de faim ou de soif.\r\n\r\nAnling doit ??galement apprendre ?? son fils les comp??tences de base de survie telles que la cuisine, la fabrication et le combat avant qu\'elle ne commence ?? dispara??tre. Elle va d??couvrir que dans certaines situations, c\'est elle qui va commencer ?? d??pendre de lui.\r\n\r\nUn ??quilibre parfait entre la gestion de vos journ??es ?? chercher des ressources et l\'am??lioration des comp??tences de Cody sera n??cessaire pour survivre ?? ce long voyage.',	'https://www.youtube.com/embed/zwGKUAgcld8',	'../../uploads/Undying.jpg',	2,	19,	1),
(81,	'The Unfinished Swan',	'Giant Sparrow',	'2020-09-10',	'2020-09-10',	'Par les cr??ateurs de What Remains of Edith Finch.\r\n\r\nDans The Unfinished Swan, explorez et d??couvrez un myst??rieux paysage enti??rement blanc en l?????claboussant de couleurs. Vous incarnerez Monroe, un jeune orphelin de 10 ans, et suivrez un cygne sorti d???un tableau inachev?? jusque dans un royaume fantastique tout droit tir?? d???un livre d???histoires. Chaque chapitre renferme son lot de surprises, de fa??ons d???explorer le monde, de cr??atures bizarres (et parfois dangereuses) et de rencontres avec le roi excentrique ?? l???origine de cet empire.',	'https://www.youtube.com/embed/xFfteZaAXq4',	'../../uploads/unfinished.jpg',	2,	3,	1),
(82,	'Unpacking',	'Witch Beam',	'2021-11-02',	'2021-11-02',	'Unpacking est un jeu zen sur l\'exp??rience famili??re de sortir ses affaires de cartons et de les placer dans une nouvelle maison. Moiti?? puzzle de placement de blocs, moiti?? d??coration d\'int??rieur, venez cr??er un espace de vie agr??able tout en d??couvrant des indices sur la vie que vous d??ballez. Au fil des huit d??m??nagements dans de nouvelles maisons, vous aurez l\'opportunit?? de vivre un sentiment d\'intimit?? avec un personnage que vous ne verrez jamais et une histoire dont vous ne savez rien.',	'https://www.youtube.com/embed/_BG98e_w6d0',	'../../uploads/Unpacking.jpg',	1,	17,	1),
(83,	'Wartales',	'Shiro Games',	'2021-12-01',	'2021-12-01',	'Un si??cle s\'est ??coul?? depuis l\'??pid??mie sans pr??c??dent qui a d??vast?? l\'empire d\'Edoran et entra??n?? sa chute. Depuis, ces terres sont en proie au tumulte et ?? l\'instabilit??. Mercenaires, bandits de grand chemin et autres voleurs arpentent d??sormais routes et villes, et toute notion d\'honneur n\'est plus qu???un lointain souvenir.\r\n\r\nL\'heure est venue pour vous de mener un groupe de personnages sans foi ni loi ?? travers un immense monde ouvert o?? les combats, la mort et la soif de richesses fa??onneront votre quotidien. Vous n\'incarnez ni un individu hors norme, ni un ??lu, et encore moins un h??ros destin?? ?? r??tablir la paix. Votre seul et unique objectif : survivre et prosp??rer dans un monde hostile.\r\n\r\nSeuls les plus courageux et les plus ambitieux peuvent esp??rer graver leur nom dans l\'histoire de Wartales !',	'https://www.youtube.com/embed/68L5J9bDYsg',	'../../uploads/wartales.jpg',	2,	12,	1),
(84,	'WorldBox God Simulator',	'Maxim Karpenko',	'2021-12-02',	'2021-12-02',	'WorldBox est le simulateur ULTIME de dieu et un jeu sandbox!\r\nCr??ez votre propre monde ou d??truisez-le en utilisant diff??rents pouvoirs :\r\nSimulateur de Dieu. Il y a beaucoup de pouvoirs dans votre bo??te ?? outils qui peuvent ??tre utilis??s sans mana ou ressources.\r\nMonde vivant. Les cr??atures ont des caract??res et des besoins. Les animaux vont chercher de la nourriture. Les rois cupides essaieront d\'obtenir plus de terres.',	'https://www.youtube.com/embed/9RzAgcnK-fU',	'../../uploads/world box.jpg',	3,	16,	1),
(85,	'Youtubers Life',	'UPLAY Online',	'2016-05-18',	'2016-05-18',	'Youtubers Life est le jeu vid??o ultime de simulation/gestion dans lequel vous devenez le plus grand cr??ateur de contenu de l\'histoire en ??ditant des vid??os, en augmentant le nombre de fans et en devenant riche. Cr??ez votre personnage et commencez ?? r??aliser vos premi??res diffusions dans votre chambre chez vos parents o?? vous avez grandi. Gardez un ??il sur vos t??ches quotidiennes et socialisez pour augmenter votre popularit?? tout en g??rant vos fans, vos amis, votre famille et la gestion du temps !',	'https://www.youtube.com/embed/1gMRmw6C7jw',	'../../uploads/youtubers.jpg',	2,	3,	1),
(86,	'Zombie Grinder',	'TwinDrills',	'2015-10-16',	'2015-10-16',	'Zombie Grinder est un jeu multijoueur multiplateforme qui propose une vari??t?? de modes de jeu diff??rents ?? appr??cier avec des amis, ?? la fois localement et en ligne. Vous pouvez vous frayer un chemin ?? travers de nombreuses cartes, modes de jeu et ennemis diff??rents - Avec des tonnes d\'armes et d\'options de personnalisation !\r\n\r\nLa coop??ration\r\nPrend en charge ?? la fois la coop??ration en ??cran partag?? local (et l\'??cran partag?? si en mode pvp), la coop??ration en ligne et m??me la possibilit?? de m??langer les deux - amenant plusieurs joueurs locaux dans les jeux en ligne !\r\n\r\nUne assistance est disponible pour le chat en jeu ?? l\'??chelle de la communaut?? mondiale, le chat en jeu local et le chat vocal pour faciliter la coop??ration et la mise en place de matchs !',	'https://www.youtube.com/embed/XWGkwVyH1Og',	'../../uploads/zombie.jpg',	3,	1,	1),
(87,	'Project Zomboid',	'The Indie Stone',	'2013-11-08',	'2013-11-08',	'Project Zomboid est un bac ?? sable ouvert infest?? de zombies. Il pose une question simple : comment allez-vous mourir ?\r\n\r\nDans les villes de Muldraugh et West Point, les survivants doivent piller les maisons, construire des d??fenses et faire tout leur possible pour retarder jour apr??s jour leur mort in??vitable. Aucune aide ne vient - leur survie d??pend de leur propre ruse, de leur chance et de leur capacit?? ?? ??chapper ?? une horde implacable.',	'https://www.youtube.com/embed/4eBy0woHWjA',	'../../uploads/zomboid.jpg',	2,	19,	1),
(88,	'Zorya: The Celestial Sisters ???',	'Madlife Divertissement',	'2022-02-08',	'2022-02-08',	'Perdue sur terre apr??s une s??rie d?????v??nements malheureux, Aysu, d??esse de la nuit, doit retrouver son chemin vers le ciel! Aid??e par sa s??ur Solveig, d??esse du soleil, Aysu doit retrouver ses pouvoirs dispers??s sur les terres glac??es de Vyraj tout en restant dans l\'ombre pour survivre.\r\n\r\nEmbarquez dans une aventure remplie de casse-t??tes o?? vous et votre partenaire devez prouver que vous pouvez communiquer et collaborer pour r??cup??rer les pouvoirs d\'Aysu.',	'https://www.youtube.com/embed/XIGWf6JsBwY',	'../../uploads/Zorya.jpg',	2,	18,	1),
(89,	'Roadwarden',	'Moral Anxiety Studio',	'2022-05-01',	'2022-05-01',	'Qui ou qu\'est-ce qu\'un Roadwarden ?\r\nVous ??tes un Roadwarden, un brave ??tranger qui met sa vie en danger pour faire une diff??rence dans un sombre monde imaginaire. Alors que la plupart des gens ne risqueraient jamais un voyage solitaire ?? travers les parties les plus sauvages du pays, vous acceptez volontiers la lutte. Vous gardez les voyageurs, reliez des villages isol??s, soutenez les marchands et repoussez les cr??atures attaquantes, les bandits ou m??me les morts-vivants.',	'https://www.youtube.com/embed/nHHfwGZb_c0',	'../../uploads/Roadwarden.jpg',	3,	3,	1),
(90,	'Kingdom of the Dead',	'DIRIGO GAMES',	'2022-02-10',	'2022-02-10',	'KINGDOM of the DEAD est un jeu vid??o d\'horreur en FPS dessin?? ?? la plume et ?? l\'encre. Vous incarnez l\'Agent Chamberlain, un ancien professeur reconverti en g??n??ral d\'arm??e, d??sormais au service d\'un programme gouvernemental secret connu sous le nom de GATEKEEPER, dont l\'objectif principal est de vaincre les arm??es de Death.',	'https://www.youtube.com/embed/wRSrJfEWvv4',	'../../uploads/KingdomofDead.jpg',	2,	1,	1),
(91,	'Replaced',	'Sad Cat Studios',	'2022-06-01',	'2022-06-01',	'REPLACED est un jeu de plateformes et de science-fiction r??trofuturiste en 2,5D se d??roulant dans une Am??rique alternative des ann??es 80, avec des combats fluides sur fond d???histoire dystopique !\r\n\r\nVous incarnez R.E.A.C.H., une intelligence artificielle prise au pi??ge dans un corps humain contre son gr?? et s???effor??ant de s???adapter ?? la vie humaine dans la ville de Phoenix et ses alentours.\r\n\r\nDans une soci??t?? d??faillante plong??e dans le chaos apr??s une catastrophe nucl??aire, les rues sont envahies par les hors-la-loi. La corruption et la cupidit?? r??gnent en ma??tre, et pour les puissants, les humains et leurs organes ne sont qu???une monnaie d?????change. REPLACED se joue en solo et offre un m??lange de gameplay sur plateformes et de pixel art avec des effets cin??matiques et des combats fluides.\r\n\r\nL???histoire dystopique riche et captivante se d??roule dans un pass?? alternatif, dans un monde aride, complexe et stylis?? d???inspiration cyberpunk.\r\n\r\nSous les traits de R.E.A.C.H., vous explorez et r??v??lez les myst??res de ce monde, en comprenant progressivement que tout a un prix.',	'https://www.youtube.com/embed/Ti1DtNuXFoE',	'../../uploads/replaced.jpg',	3,	3,	1);

CREATE TABLE `wc5m2_gameslanguages` (
  `interface` int(11) NOT NULL,
  `audio` int(11) NOT NULL,
  `subtitles` int(11) NOT NULL,
  `id_games` int(11) NOT NULL,
  PRIMARY KEY (`interface`,`audio`,`subtitles`,`id_games`),
  KEY `gamesLanguages_languages_audio_FK` (`audio`),
  KEY `gamesLanguages_languages_subtitles_FK` (`subtitles`),
  KEY `gamesLanguages_games_FK` (`id_games`),
  CONSTRAINT `gamesLanguages_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`),
  CONSTRAINT `gamesLanguages_languages_audio_FK` FOREIGN KEY (`audio`) REFERENCES `wc5m2_languages` (`id`),
  CONSTRAINT `gamesLanguages_languages_interface_FK` FOREIGN KEY (`interface`) REFERENCES `wc5m2_languages` (`id`),
  CONSTRAINT `gamesLanguages_languages_subtitles_FK` FOREIGN KEY (`subtitles`) REFERENCES `wc5m2_languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_graphisms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_graphisms` (`id`, `name`) VALUES
(1,	'2D'),
(2,	'3D'),
(3,	'Pixel Art');

CREATE TABLE `wc5m2_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_languages` (`id`, `name`) VALUES
(1,	'Fran??ais'),
(2,	'Anglais'),
(3,	'Italien'),
(4,	'Allemand'),
(5,	'Espagnol-Espagne'),
(6,	'Russe'),
(7,	'Tch??que'),
(8,	'Japonais'),
(9,	'Cor??en'),
(10,	'Polonais'),
(11,	'Portugais du Br??sil');

CREATE TABLE `wc5m2_mods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `releaseDate` date NOT NULL,
  `summary` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `userValidatedOwner` tinyint(1) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_games` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mods_users_FK` (`id_users`),
  KEY `mods_games_FK` (`id_games`),
  CONSTRAINT `mods_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`),
  CONSTRAINT `mods_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_modslanguages` (
  `interface` int(11) NOT NULL,
  `audio` int(11) NOT NULL,
  `subtitles` int(11) NOT NULL,
  `id_mods` int(11) NOT NULL,
  PRIMARY KEY (`interface`,`audio`,`subtitles`,`id_mods`),
  KEY `modsLanguages_languages_audio_FK` (`audio`),
  KEY `modsLanguages_languages_subtitles_FK` (`subtitles`),
  CONSTRAINT `modsLanguages_languages_audio_FK` FOREIGN KEY (`audio`) REFERENCES `wc5m2_languages` (`id`),
  CONSTRAINT `modsLanguages_languages_interface_FK` FOREIGN KEY (`interface`) REFERENCES `wc5m2_languages` (`id`),
  CONSTRAINT `modsLanguages_languages_subtitles_FK` FOREIGN KEY (`subtitles`) REFERENCES `wc5m2_languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_platforms` (`id`, `name`) VALUES
(1,	'Windows'),
(2,	'Mac');

CREATE TABLE `wc5m2_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) NOT NULL,
  `order` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_quiz_FK` (`id_quiz`),
  CONSTRAINT `questions_quiz_FK` FOREIGN KEY (`id_quiz`) REFERENCES `wc5m2_quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `explanations` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_evaluations` int(11) DEFAULT NULL,
  `id_mods` int(11) DEFAULT NULL,
  `id_comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_users_FK` (`id_users`),
  KEY `reports_evaluations_FK` (`id_evaluations`),
  KEY `reports_mods_FK` (`id_mods`),
  KEY `reports_comments_FK` (`id_comments`),
  CONSTRAINT `reports_comments_FK` FOREIGN KEY (`id_comments`) REFERENCES `wc5m2_comments` (`id`),
  CONSTRAINT `reports_evaluations_FK` FOREIGN KEY (`id_evaluations`) REFERENCES `wc5m2_evaluations` (`id`),
  CONSTRAINT `reports_mods_FK` FOREIGN KEY (`id_mods`) REFERENCES `wc5m2_mods` (`id`),
  CONSTRAINT `reports_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_roles` (`id`, `name`) VALUES
(1,	'administrateur'),
(2,	'utilisateur');

CREATE TABLE `wc5m2_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_users_FK` (`id_users`),
  KEY `scores_quiz_FK` (`id_quiz`),
  CONSTRAINT `scores_quiz_FK` FOREIGN KEY (`id_quiz`) REFERENCES `wc5m2_quiz` (`id`),
  CONSTRAINT `scores_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_types` (`id`, `name`) VALUES
(1,	'Action'),
(2,	'Adresse'),
(3,	'Aventure'),
(4,	'Beat\'em all'),
(5,	'City-builder'),
(6,	'Combat'),
(7,	'Course'),
(8,	'Craft'),
(9,	'FPS'),
(10,	'gestion'),
(11,	'hack\'n slash'),
(12,	'RPG'),
(13,	'narratif'),
(14,	'plateforme'),
(15,	'reflexion'),
(16,	'sandbox'),
(17,	'simulation'),
(18,	'strategie'),
(19,	'survie'),
(20,	'horreur');

CREATE TABLE `wc5m2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `starred` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `id_roles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_FK` (`id_roles`),
  CONSTRAINT `users_roles_FK` FOREIGN KEY (`id_roles`) REFERENCES `wc5m2_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_users` (`id`, `name`, `email`, `password`, `starred`, `blocked`, `id_roles`) VALUES
(1,	'Quentin',	'quentintirmant@gmail.com',	'$2y$10$iDY75YALTQDsayLywAzBj.sssNBeC3z0c1t9NskYVvjqsWw2nwyNC',	0,	0,	1),
(2,	'Joselyne',	'Joselyne@hotmail.fr',	'$2y$10$XlJLMDFpgK2qzrnUUbyT6uJc9S0BLLoTvORTqQiPGr9xHlwjie36G',	0,	0,	2),
(3,	'Bastien',	'bastien25@hotmail.fr',	'$2y$10$j2MJjWzloxMrTZAO02GcKeFHcyZz/8zADsRQn8qFG/Czu1bi0pdjy',	0,	0,	2),
(4,	'Charlotte',	'charlotte.tirmant@gmail.com',	'$2y$10$qSRtrEH8EBHUzmOMti4AoO13jc8bz/NW10mzRd3UqczSEtx6Tr5M.',	0,	0,	2);

