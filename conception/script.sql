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
(1,	'Undungeon',	'Laughing Machines',	'2021-11-18',	'2021-11-18',	'À mi-chemin entre l\'action et le jeu de rôle, Undungeon reprend tous les éléments qui ont donné aux A-RPG d\'antan leurs lettres de noblesse et les transcende grâce à un design résolument moderne. Rétablissez l\'ordre dans toutes les dimensions, influencez et déterminez le destin des mondes et forgez l\'avenir du nouveau Multivers.',	'https://www.youtube.com/embed/XVmjl2o3PUw',	'../../uploads/Action carroussel maquette 2.jpg',	3,	1,	1),
(2,	'Bright Memory',	'FYQD-Studio',	'2020-03-25',	'2019-01-12',	'Bright Memory est un jeu mélangeant FPS et action créé à l\'aide d\'Unreal Engine par le studio de développement FYQD composé d\'une seule personne. Combinez une grande variété de techniques et de capacités pour réaliser de superbes combos d\'attaque à la vitesse de la lumière tout en découvrant les aventures de Shelia, agent du SRO (Supernatural Science Research Organization) !',	'https://www.youtube.com/embed/MmmBuE_mYS0',	'../../uploads/Action carroussel maquette.jpg',	2,	3,	1),
(3,	'Hollow Knight: Silksong',	'Team Cherry',	'2022-02-01',	'2022-02-01',	'Devenez la princesse chevalier\r\nIncarnez Hornet, la princesse protectrice d\'Hallownest, et partez à l\'aventure dans un tout nouveau royaume gouverné par la soie et le chant ! Capturée et amenée dans ce monde inconnu, Hornet doit combattre des ennemis et résoudre des mystères alors qu\'elle monte dans un pèlerinage mortel au sommet du royaume.\r\n\r\nHollow Knight: Silksong est la suite épique de Hollow Knight, l\'action-aventure primée. En tant que chasseur mortel Hornet, voyagez vers de toutes nouvelles terres, découvrez de nouveaux pouvoirs, combattez de vastes hordes d\'insectes et de bêtes et découvrez d\'anciens secrets liés à votre nature et à votre passé.',	'https://www.youtube.com/embed/UAO2urG23S4',	'../../uploads/Action carroussel maquette3.jpg',	1,	1,	1),
(4,	'Aim Lab',	'Statespace',	'2018-02-07',	'2018-02-07',	'Aim Lab est encore au début de sa phase bêta.. Seulement 40% du jeux est terminé donc vous trouverez encore des bugs ! Nous travaillons sur des nouvelles fonctionnalités, comme le support d\'autres langues et plus d\'options de personnalisation ! Contribuez au projet en postant sur notre forum Steam ou en rejoignant notre Discord!',	'https://www.youtube.com/embed/TbpzIh3sp0Y',	'../../uploads/aimlab.jpg',	2,	3,	1),
(5,	'ARK: Genesis Season Pass',	'Studio Wildcard, Instinct Games, Efecto Studios, Virtual Basement LLC',	'2019-08-08',	'2019-08-08',	'Votre quête de survie ultime est maintenant terminée avec le Season Pass ARK: Genesis, comprenant la partie 1 et la partie 2! Dans ces extensions, vous conclurez le scénario ARK tout en vous aventurant dans de nouveaux mondes exotiques avec un tout nouveau gameplay basé sur les missions. Découvrez, utilisez et maîtrisez de nouvelles créatures, de nouveaux objets à fabriquer, des armes et des structures qui ne ressemblent à rien de ce que vous avez encore vu! La saga est maintenant terminée et des centaines d\'heures de nouveau gameplay ARK axé sur l\'histoire vous attendent!',	'https://www.youtube.com/embed/QJifr55qf6E',	'../../uploads/arkGenesis.jpg',	2,	3,	1),
(6,	'Baba Is You',	'Hempuli Oy',	'2019-03-13',	'2019-03-13',	'Baba Is You est un jeu de réflexion primé dans lequel vous pouvez changer les règles du jeu lui-même. Dans chaque niveau, les règles se présentent sous forme de blocs amovibles : les manipuler altère le fonctionnement du niveau et provoque des interactions inattendues ! Une simple poussée sur un bloc peut vous transformer en rocher, changer des mottes d\'herbe en obstacles brûlants et même métamorphoser l’objectif à atteindre.',	'https://www.youtube.com/embed/Ca5BYKRVXHM',	'../../uploads/baba.jpg',	1,	15,	1),
(7,	'BattleBlock Theater®',	'The Behemoth',	'2014-05-15',	'2014-05-15',	'Échoué… capturé… trahi… contraint de se donner en spectacle devant un public félin !? Oui, tout ça et bien plus encore dans BattleBlock Theater ! Une fois lancé dans votre quête pour libérer plus de 300 de vos amis faits prisonniers par des chats diaboliques et hautement évolués, il n\'y aura plus de retour possible. Plongez au cœur de cette histoire de trahison renversante et usez de votre arsenal d\'armes-outils pour progresser dans des centaines de niveaux et élucider le mystère qui plane sur BattleBlock Theater.\r\n\r\nSi vous n\'aimez pas être seul sous les feux des projecteurs, partez en ligne ou trouvez un bon copain en chair et en os pour accomplir une quête cooptimisée aux petits oignons ou participer aux arènes. Le jeu inclut également un éditeur de niveaux pour vous permettre de créer vous-même des épreuves et défis tordus !',	'https://www.youtube.com/embed/pv1ZoHt6poI',	'../../uploads/battle.jpg',	1,	3,	1),
(8,	'Beat Saber',	'Beat Games',	'2019-05-21',	'2019-05-21',	'Beat Saber est une expérience rythmique immersive sans précédent ! Découvrez des tonnes de niveaux conçus à la main et laissez-vous happer par une musique électronique entraînante, le tout dans un environnement futuriste. Utilisez vos sabres pour trancher les notes à mesure qu\'elles arrivent vers vous. Chaque cube indique quel sabre vous devez utiliser et dans quelle direction vous devez trancher.',	'https://www.youtube.com/embed/vL39Sg2AqWg',	'../../uploads/beatsaber.jpg',	2,	15,	1),
(9,	'Blade and Sorcery',	'WarpFrog',	'2018-12-11',	'2018-12-11',	'L\'ère du combat à l\'épée en apesanteur en réalité virtuelle est révolue. Blade & Sorcery est un bac à sable fantastique médiéval pas comme les autres, axé sur les combats de mêlée, à distance et magiques qui utilise pleinement un système d\'interaction et de combat unique et réaliste basé sur la physique.\r\n',	'https://www.youtube.com/embed/fOJkoHDfaNU',	'../../uploads/blade.jpg',	2,	12,	1),
(10,	'Boneworks',	'Stress Level Zero',	'2019-12-10',	'2019-12-10',	'BONEWORKS est une aventure d\'action narrative en réalité virtuelle utilisant des mécanismes physiques expérimentaux avancés. Naviguez de manière dynamique dans des environnements, engagez-vous dans des combats lourds de physique et abordez de manière créative des énigmes avec la physique.',	'https://www.youtube.com/embed/oP8C2nmv3Ag',	'../../uploads/bones.jpg',	2,	17,	1),
(11,	'Boundless',	'Wonderstruck',	'2018-09-11',	'2018-09-11',	'Boundless est un MMO sans abonnement soutenu par des achats intégrés optionnels.\r\n\r\nDans un univers infini de mondes connectés, tous les choix du joueur auront un impact. Explorateur ? Constructeur ? Chasseur ? Commerçant ? Artisan ? Suivez votre propre voie.\r\n\r\nOuvrez des portails pour voyager sans problème entre diverses planètes à mesure que vous vivez votre aventure à travers l\'univers. Regardez le soleil se lever sur un monde volcanique avant de rejoindre des amis pour prospecter de précieuses ressources sur une planète désertique.',	'https://www.youtube.com/embed/qZh_O32HsZ0',	'../../uploads/boundless.jpg',	2,	12,	1),
(12,	'CARRION',	'Phobia Game Studio',	'2020-07-23',	'2020-07-23',	'CARRION est un jeu d\'horreur inversé : vous incarnez une créature informe d\'origine inconnue, captive d\'un complexe de recherche. Traquez vos geôliers pour les dévorer sans aucune pitié, et semez la terreur dans votre sillage. Grandissez, grossissez et évoluez tout en démolissant cette gigantesque prison et profitez-en pour débloquer des capacités de plus en plus dévastatrices. Votre vengeance sera sanglante !',	'https://www.youtube.com/embed/Ozknd5FBFE4',	'../../uploads/carrion.jpg',	3,	3,	1),
(13,	'Potion Craft',	'Niceplay games',	'2021-09-21',	'2021-09-21',	'Apprenez l\'art de la fabrication de potions\r\nConcoctez votre potion. Moulez des ingrédients et mélangez-les soigneusement dans votre chaudron. Chauffez les charbons ardents. Faites bouillir, mélangez. Ajoutez la base : eau, huile, ou... autre chose. Bravo, vous avez créé votre première potion ! C\'était facile à apprendre ? Essayez maintenant de maîtriser la technique !',	'https://www.youtube.com/embed/iGNAAflyjac',	'../../uploads/potion image.jpg',	3,	17,	1),
(14,	'Celeste',	'Extremely OK Games, Ltd.',	'2018-01-25',	'2018-01-25',	'Aidez Madeline à survivre à ses démons intérieurs au mont Celeste, dans ce jeu de plateformes ultra relevé fait à la main, réalisé par les créateurs du classique TowerFall.',	'https://www.youtube.com/embed/wpPbNgFEetU',	'../../uploads/celeste.jpg',	3,	3,	1),
(15,	'Command & Conquer™ Remastered Collection',	'Petroglyph, Lemon Sky Studios',	'2020-06-05',	'2020-06-05',	'Command & Conquer et Alerte Rouge ont défini le genre des jeux STR il y a 25 ans et viennent d\'être entièrement remastérisés en 4K par les anciens membres de l’équipe de Westwood Studios, aujourd\'hui chez Petroglyph Games. Inclut les 3 packs d\'extension, le multijoueur remodelé, une interface modernisée, un éditeur de cartes, une galerie de photos FMV inédites et plus de 7 heures de musique légendaire remastérisée par Frank Klepacki. Bienvenue, Commandant !',	'https://www.youtube.com/embed/9iMfypQj3k0',	'../../uploads/commandConquer.jpg',	1,	18,	1),
(16,	'Crypto Is Dead',	'The Moon Pirates',	'2021-07-23',	'2021-07-23',	'Crypto Is Dead pourrait être qualifié de \"Papers, Please\"-like. C\'est un mix entre simulation et jeu de puzzle dans lequel vous allez devoir faire fructifier votre banque durant 30 jours. Pour cela, vous devrez vérifier des billets et trouver s\'ils sont authentiques ou non. Au cours de votre mois de travail, vous allez devoir accumuler de l\'argent, payer des taxes et mettre à jour vos outils pour suivre le rythme de la Banque Centrale.',	'https://www.youtube.com/embed/hCrLZCHAQSA',	'../../uploads/cryptoIsDead.jpg',	3,	17,	1),
(17,	'Darkest Dungeon®',	'Red Hook Studios',	'2016-01-19',	'2016-01-19',	'Darkest Dungeon est un JdR rogue-like au tour par tour, gothique et sans pitié, sur le stress psychologique de partir à l\'aventure.\r\n\r\nRecrute, entraîne et mène une équipe d\'anti-héros au travers de forêts déformées, de tanières oubliées, de cryptes en ruines et au-delà. Tu combattras non seulement des ennemis inimaginables mais aussi le stress, la famine, la maladie et les envahissantes ténèbres. Découvre d\'étrange mystères et lance les héros contre un ensemble de monstres effrayants grâce à un système de combat au tour par tour innovant.',	'https://www.youtube.com/embed/AQLxdHfMPF8',	'../../uploads/darkestDungeon.jpg',	1,	12,	1),
(18,	'Dead Cells',	'Motion Twin',	'2018-08-06',	'2018-08-06',	'Vous avez grandi avec les roguelikes, connu la montée des roguelites, et même assisté à la naissance des roguelites-lite ? Laissez-nous vous présenter notre modeste contribution à cette honorable lignée: le RogueVania, enfant illégitime né du mariage entre un roguelite moderne (Rogue Legacy, Binding of Isaac, Enter the Gungeon, Spelunky, etc.) et un Metroidvania à l’ancienne.',	'https://www.youtube.com/embed/-5jPXBDDRb0',	'../../uploads/dead.jpg',	3,	1,	1),
(19,	'Despot\'s Game: Dystopian Army Builder',	'Konfa Games',	'2021-10-14',	'2021-10-14',	'Savant mélange de tactiques rogue-like et de batailles explosives, Despot’s Game vous met au défi de lever une armée et d’en sacrifier tous les bidasses jusqu’au dernier pour atomiser les ennemis... et d’autres joueurs !',	'https://www.youtube.com/embed/Ge3QYg9U60g',	'../../uploads/DespotGame.jpg',	3,	18,	1),
(22,	'Disco Elysium',	'ZA & UM',	'2019-10-19',	'2019-10-19',	'Disco Elysium - The Final Cut est un jeu de rôle révolutionnaire dans un monde ouvert. Vous êtes un enquêteur, avec un système de talents unique en son genre et tout un pan urbain à arpenter. Interrogez des personnages inoubliables, résolvez des crimes ou acceptez des pots-de-vin. Libre à vous d’incarner un héros ou une épave humaine irrécupérable.',	'https://www.youtube.com/embed/YV2lp6p_gXw',	'../../uploads/disco.jpg',	2,	12,	1),
(23,	'Divinity Original Sin 2',	'Larian Studios',	'2017-09-14',	'2017-09-14',	'Le Divin est mort, le Néant approche à grands pas, et la puissance qui sommeille en vous est sur le point de s\'éveiller. Le combat pour la divinité a commencé. Soupesez vos décisions avec soin et accordez votre confiance avec parcimonie, car les ténèbres rôdent dans tous les cœurs.',	'https://www.youtube.com/embed/bTWTFX8qzPI',	'../../uploads/divinity.jpg',	2,	12,	1),
(24,	'Don\'t Starve Together',	'Klei Entertainment',	'2016-04-21',	'2016-04-21',	'Don\'t Starve Together est l’extension multijoueur autonome de Don’t Starve, le jeu de survie intransigeant qui se déroule dans un univers sauvage.\r\n\r\nEntrez dans un monde bizarre et inexploré, plein d’étranges créatures, de dangers et de surprises. Collectez des ressources pour fabriquer des objets et des structures qui correspondent à votre style de survie. Jouez en élucidant les mystères d’un bien curieux pays.\r\n\r\nCoopérez avec vos amis dans des parties privées, ou tentez votre chance avec des inconnus en ligne. Collaborez avec d’autres joueurs pour survivre dans un environnement rigoureux, ou débattez-vous tout seul.\r\n\r\nFaites le nécessaire, mais surtout : ne mourez pas de faim !',	'https://www.youtube.com/embed/bVbyn7c1X6E',	'../../uploads/don\'t starve.jpg',	2,	17,	1),
(25,	'Dysmantle',	'10tons Ltd',	'2021-11-16',	'2020-11-06',	'Alors que vous émergez de votre abri, après d\'interminables années, un monde nouveau, et pourtant vaguement familier, vous tend les bras. Un monde rempli de créatures affreuses, mais vide de tout autre être humain, un monde où la nature cruelle a repris ses droits. Un monde sur le point de devenir plus terrifiant encore.',	'https://www.youtube.com/embed/1zbSFUROKYo',	'../../uploads/Dysmantle.jpg',	2,	1,	1),
(26,	'Escape Simulator',	'Pine Studio',	'2021-10-19',	'2021-10-19',	'Escape Simulator est un jeu d\'énigmes à la première personne, qui peut être joué seul ou en ligne en mode co-op. Explorez un nombre grandissant de scènes hautement interactive d\'Escape rooms. Déplacez les meubles, ramassez et examinez tout ce qui se trouve dans la pièce, cassez des vases et faites sauter des verrous! L\'éditeur de niveau supporte les scènes créent par la communauté.',	'https://www.youtube.com/embed/2VT7_tfRYV8',	'../../uploads/escape.jpg',	2,	3,	1),
(27,	'Euro Truck Simulator 2',	'SCS Software',	'2012-10-18',	'2012-10-18',	'Voyagez à travers l\'Europe en tant que roi de la route, un chauffeur routier qui livre d\'importantes cargaisons vers des destinations très lointaines ! Avec des douzaines de villes à explorer du Royaume-Uni, de Belgique, d\'Allemagne, d\'Italie, des Pays-Bas, de Pologne et de bien d\'autres pays, votre endurance, vos talents et votre rapidité seront poussés dans leur retranchements. Si vous avez les capacités pour être un pilote de poids-lourd d\'élite, trouvez un volant et prouvez-le !',	'https://www.youtube.com/embed/xlTuC18xVII',	'../../uploads/eurotruck.jpg',	2,	17,	1),
(28,	'Firestone Idle RPG',	'Holyday Studios',	'2019-09-26',	'2019-09-26',	'Le jeu Firestone Idle RPG se situe dans le royaume fantastique d\'Alandria, où les forces mortes-vivantes des Orcs se rassemblent à nouveau pour semer le chaos sur le territoire. Cette fois, elles possèdent la puissance titanesque des Firestones. Le roi vous a chargé de former un groupe de héros afin de les arrêter, de récupérer les Firestones et de sauver le royaume.',	'https://www.youtube.com/embed/BgWBPxkmEIc',	'../../uploads/firestone.jpg',	1,	12,	1),
(29,	'The Forgotten City',	'Modern Storyteller',	'2021-07-28',	'2021-07-28',	'The Forgotten City est un jeu d\'aventure énigmatique mêlant exploration et déduction. C\'est une version revisitée du mod acclamé par la critique qui a remporté un prix national de la Writers\' Guild et qui a été téléchargé plus de 3 millions de fois.\r\n\r\nLe combat est une option, mais la violence ne vous mènera pas loin. Ce n\'est qu\'en interrogeant une communauté de personnages hauts en couleur, en exploitant intelligemment la boucle temporelle et en faisant des choix moraux difficiles que vous pourrez espérer résoudre ce mystère épique. Ici, vos décisions ont des conséquences. Le destin de la cité est entre vos mains.',	'https://www.youtube.com/embed/zDF3VFaHSz0',	'../../uploads/forgotten.jpg',	2,	3,	1),
(30,	'House Flipper Garden DLC',	'Empyrean',	'2019-05-16',	'2019-05-16',	'Avez-vous déjà rêvé de devenir jardinier ? Grâce à Garden Flipper DLC, c’est désormais possible !\r\nAvant de commencer à planter des arbres et des fleurs, vous devrez vous débarrasser des ordures et des gravats.\r\nTondez la pelouse, coupez les arbres dont vous ne voulez plus, arrachez les mauvaises herbes et tracez des sentiers entre vos parterres de fleurs.\r\n\r\nRéalisez de toutes nouvelles missions et découvrez des mécaniques innovantes que nous avons conçues en coopération avec des jardiniers professionnels !\r\nPas à pas, plongez dans le monde de la végétation. Transformez des jardins désolés en véritables œuvres d\'art.\r\nEt quand vous serez prêt à concevoir votre propre jardin…',	'https://www.youtube.com/embed/cI0ltZhefys',	'../../uploads/garden.jpg',	2,	17,	1),
(31,	'Gas Station Simulator',	'DRAGO entertainment',	'2021-09-15',	'2021-09-15',	'Gas Station Simulator consiste à rénover, agrandir et gérer une station-service au bord d\'une autoroute en plein désert. La liberté de choix et de multiples approches pour gérer votre entreprise et faire face à la pression sont les ingrédients clés de ce jeu.',	'https://www.youtube.com/embed/VAg0R3EPDkw',	'../../uploads/gasStation.jpg',	2,	17,	1),
(32,	'Graveyard Keeper',	'Lazy Bear Games',	'2018-08-15',	'2018-08-15',	'Graveyard Keeper est la simulation de gestion de cimetière médiéval la moins authentique de tous les temps ! Entretenez et développez votre cimetière, trouvez des moyens de réduire les coûts, diversifiez-vous dans d\'autres domaines d\'activité et utilisez les ressources à votre disposition. Une vraie aventure capitaliste : serez-vous capable de faire tout ce qui est nécessaire pour développer votre petite entreprise ? Il y a aussi une histoire d\'amour !',	'https://www.youtube.com/embed/GmZS6XFBJfQ',	'../../uploads/Graveyard.jpg',	3,	17,	1),
(33,	'Gunfire Reborn',	'Duoyi Games',	'2021-11-18',	'2020-05-05',	'Gunfire Reborn est un jeu d\'aventure divisé en niveaux et mêlant jeu de tir à la première personne, Roguelite et JDR. Les joueurs prennent le contrôle de héros possédant diverses compétences à combiner pour varier leur expérience. Ils peuvent se servir d\'armes trouvées au hasard pour explorer des niveaux aléatoires. Vous pouvez jouer à ce jeu en solo ou en coopération (jusqu\'à quatre joueurs).\r\n\r\nDans ce jeu, chaque niveau est généré aléatoirement. À chaque nouveau départ, vous profiterez d\'une toute nouvelle expérience. Vous découvrirez des talents de héros, des armes, des objets, des points de réapparition et des rythmes de combat différents, propres à chaque niveau.',	'https://www.youtube.com/embed/X7C7DhWbz98',	'../../uploads/gunfire.jpg',	2,	3,	1),
(34,	'Hades',	'Supergiant Games',	'2020-09-17',	'2019-12-10',	'Hades est un rogue-like en mode dungeon crawler qui associe le meilleur des titres de Supergiant salués par la critique. Il combine l\'action effrénée de Bastion, la profondeur et l\'atmosphère très riche de Transistor, ainsi que la narration centrée sur les personnages qui caractérise Pyre.',	'https://www.youtube.com/embed/91t0ha9x0AE',	'../../uploads/hades.jpg',	3,	1,	1),
(35,	'Hollow Knight Silksong',	'Team Cherry',	'2022-02-28',	'2022-02-28',	'Devenez la princesse chevalier\r\nIncarnez Hornet, la princesse protectrice d\'Hallownest, et partez à l\'aventure dans un tout nouveau royaume gouverné par la soie et le chant ! Capturée et amenée dans ce monde inconnu, Hornet doit combattre des ennemis et résoudre des mystères alors qu\'elle monte dans un pèlerinage mortel au sommet du royaume.\r\n\r\nHollow Knight: Silksong est la suite épique de Hollow Knight, l\'action-aventure primée. En tant que chasseur mortel Hornet, voyagez vers de toutes nouvelles terres, découvrez de nouveaux pouvoirs, combattez de vastes hordes d\'insectes et de bêtes et découvrez d\'anciens secrets liés à votre nature et à votre passé.',	'https://www.youtube.com/embed/yYgid2tsJFw',	'../../uploads/hollow knight.jpg',	3,	3,	1),
(36,	'House Builder',	'FreeMind S.A.',	'2021-11-11',	'2021-11-11',	'Ils disent qu\'un homme doit faire trois choses dans sa vie: planter un arbre, engendrer un fils et construire une maison.\r\nNous ne pouvons pas vous aider avec l\'arbre ni avec le fils, mais vous pouvez construire autant de maisons que vous le souhaitez en jouant à House Builder.\r\n\r\nDevenez un seul équipage de construction et construisez des maisons comme une simple hutte de boue africaine et aussi complexe qu\'une merveille architecturale d\'économie d\'énergie super moderne.',	'https://www.youtube.com/embed/HCawWjFQjSw',	'../../uploads/house builder.jpg',	2,	17,	1),
(37,	'Hydroneer',	'Foulball Hangover',	'2020-05-08',	'2020-05-08',	'Hydroneer est un jeu bac à sable de minage où vous creusez pour trouver de l’or et d’autres ressources afin de construire d’imposantes machines et votre base d’opérations. Commencez avec de simples outils puis développez de la machinerie hydraulique et des structures construites par vos soins pour miner et faire évoluer davantage votre entreprise au sein d’un système de progression riche.',	'https://www.youtube.com/embed/ZfGr4BZrbJQ',	'../../uploads/hydroneer.jpg',	2,	18,	1),
(38,	'Islanders',	'GrizzlyGames',	'2019-04-04',	'2019-04-04',	'Un petit mot des développeurs :\r\nTu rêves de construire de magnifiques villes sans y passer trop de temps et sans stresse ? N’en dit pas plus ! ISLANDERS est fait pour toi.\r\n\r\nISLANDERS est un jeu stratégique et minimaliste qui permet de construire ta propre ville sur différentes îles pleines de couleurs. Explore un nombre infini de nouveaux paysages, colonise les en créant des villages qui deviendront de vastes villes, tout en profitant de ce moment de manière détendue.',	'https://www.youtube.com/embed/nnDWm9dpu3o',	'../../uploads/islanders.jpg',	2,	18,	1),
(39,	'I, Zombie',	'Awesome Games Studio',	'2014-12-09',	'2014-12-09',	'Un jeu de zombie pas comme les autres : cette fois, c\'est VOUS le zombie ! Dirigez votre horde de zombies, luttez pour votre liberté et veillez à ce que les zombies règnent sur le monde !\r\n\r\nDans I, Zombie, vous jouez le chef d\'une horde de zombies. Votre objectif est de contaminer tous les humains présents sur la carte. Chaque humain infecté se transforme en zombie, rejoint votre horde... et peut être envoyé contre des soldats bien armés. Vous pouvez commander à votre horde d\'attaquer des ennemis, de vous suivre ou d\'attendre vos ordres. Soyez fin stratège et élaborez des plans d\'action solides afin de remporter la victoire dans chaque scénario.',	'https://www.youtube.com/embed/aCPD5wCufpI',	'../../uploads/izombie.jpg',	1,	18,	1),
(40,	'Judgment  simulateur de survie',	'Suncrash',	'2018-05-03',	'2018-05-03',	'Reconstruisez la société. Survivez à l\'apocalypse.\r\n\r\nJudgment: Apocalypse Survival Simulation est un jeu de simulation de colonie proposant des combats tactiques au beau milieu d\'une apocalypse démoniaque. Les portes de l\'enfer se sont ouvertes, libérant des démons sans pitié sur notre monde. Mais vous pouvez vous venger ! Guidez un groupe de survivants à travers ce chaos en évitant des créatures infernales et en construisant un sanctuaire. Survivez en récoltant des ressources, en fabriquant de l\'équipement, en défendant votre base et en envoyant des équipes piller des provisions. Recherchez les technologies humaines et utilisez les arts maléfiques pour trouver un moyen de renvoyer les démons en enfer.\r\n\r\nLa victoire dépend de votre survie. Survivrez-vous au jugement dernier ?',	'https://www.youtube.com/embed/FuNRNHS830w',	'../../uploads/judgment.jpg',	1,	19,	1),
(41,	'Kenshi',	'Lo Fi Games',	'2018-12-06',	'2018-12-06',	'Un RPG en escouade dans un monde ouvert, avec un gameplay de type sandbox plutôt qu’une histoire linéaire. Vous pourrez y être un marchand, un voleur, un rebelle, un chef de guerre, un aventurier, un fermier, un esclave… ou juste de la nourriture pour cannibales.\r\n\r\nRecherchez du matériel et fabriquez de nouveaux équipements. Achetez et améliorez vos propres bâtiments. Faites-en des abris fortifiés où vous réfugier quand les choses tournent mal, ou utilisez-les pour démarrer une activité. Aidez ou combattez les diverses factions existant dans le monde tout en veillant à conserver assez de forces et de richesse… Vous en aurez besoin pour survivre dans ce désert impitoyable. Entraînez vos hommes au combat pour qu’ils passent du statut de frêles victimes à celui de maîtres guerriers. Portez les blessés de votre escouade pour les mettre en sécurité et les ramener vivants à la base.',	'https://www.youtube.com/embed/GWj4h_Q0Dxc',	'../../uploads/kenshi.jpg',	2,	18,	1),
(42,	'Kingdom Wars 2 Definitive Edition',	'Reverie World Studios',	'2019-07-09',	'2019-07-09',	'Kingdom Wars 2: Definitive Edition est un jeu de stratégie en temps réel dans un monde de dark fantasy peuplé d\'Orcs, d\'Elfes et de Dragons mêlant survie, fabrication sur le long terme, construction de villes complexes au rythme haletant et combats d\'escarmouche qui transforment les paysages en champs de bataille immaculés de sang.',	'https://www.youtube.com/embed/_zPy2alPCe4',	'../../uploads/kingdom.jpg',	2,	18,	1),
(43,	'Len\'s Island',	'Flow Studio',	'2021-11-26',	'2021-11-26',	'Vous êtes nouveau en ville, avec seulement les outils dans votre sac à dos et une attitude positive, vous construisez une nouvelle vie pour vous-même sur la magnifique île voisine.\r\nDécouvrez les sombres secrets que recèle l\'île en vous aventurant plus profondément dans les grottes pour rechercher ce que les voyageurs du passé ont recherché.\r\n\r\nLen\'s Island est un mélange de construction paisible, d\'agriculture et d\'artisanat, mélangé à des combats intenses, des batailles de donjons et de l\'exploration.',	'https://www.youtube.com/embed/zDFu5p27g4E',	'../../uploads/lensIsland.jpg',	2,	3,	1),
(44,	'Little Inferno',	'Tomorrow Corporation',	'2012-11-19',	'2012-11-19',	'*** Plus de 1 million de copies vendues! ***\r\nFélicitations pour l\'achat de votre Foyer de divertissement Little Inferno ! Jetez vos jouets dans le feu et jouez avec eux pendant qu\'ils brûlent. Restez bien au chaud à l\'intérieur. Aussi loin que l\'on se souvienne, il neige dehors !\r\n\r\nBrûlez des bûches, des robots hurlants, des cartes de crédit, des piles, des poissons explosifs, des dispositifs nucléaires instables, et des galaxies miniatures. Une aventure prenant place presque entièrement devant une cheminée - en regardant là-haut là-haut là-haut par le conduit, tandis qu\'un monde gelé se trouve juste de l\'autre côté du mur.',	'https://www.youtube.com/embed/-0TniR3Ghxc',	'../../uploads/little.jpg',	1,	3,	1),
(45,	'Logic World',	'Mouse Hat Games',	'2021-10-22',	'2021-10-22',	'Logic World est un simulateur de circuit pas comme les autres. Plongez dans un monde lumineux et coloré en construisant des circuits en 3D du point de vue de la première personne. Découvrez la magie et les merveilles de la logique numérique et développez vos compétences en construisant des machines d\'une complexité et d\'une grandeur croissantes.',	'https://www.youtube.com/embed/h7pT89D4SPI',	'../../uploads/LogicWorld.jpg',	2,	17,	1),
(46,	'House Flipper Luxury DLC',	'Empyrean, Frozen Way',	'2021-10-14',	'2021-10-14',	'Fini les petites maisons avec des dizaines de petites pièces : c\'est la taille qui compte !\r\nDes verrières, de grandes baies vitrées à la place des murs et un plafond qui fait deux fois votre taille, c\'est comme ça que vivent les rois !\r\nRénovez des immeubles délabrés et de vieux bâtiments industriels tels que des usines, de grands centres commerciaux et des entrepôts, et transformez-les en appartements de luxe.',	'https://www.youtube.com/embed/78hXuSOYhsk',	'../../uploads/luxury.jpg',	2,	17,	1),
(47,	'Melvor Idle',	'Games by Malcs',	'2021-05-18',	'2020-11-20',	'Inspiré de RuneScape, Melvor Idle a pris tous les éléments qui rendent les jeux d\'aventure si captivants pour les réduire à leur forme la plus pure !\r\n\r\nMaîtrisez les nombreuses compétences runescapiennes de Melvor d\'un simple clic ou du bout du doigt. Melvor Idle est un jeu incrémental riche en fonctionnalités qui associe une atmosphère clairement familière à une expérience de jeu neuve. Il n\'a jamais été aussi relaxant de maîtriser plus de 20 compétences ! Que vous soyez un petit nouveau ou un vétéran aguerri du monde de RuneScape, ou si vous cherchez simplement une aventure riche mais accessible qui convient à votre rythme de vie effréné, Melvor est une expérience inactive à aucune autre pareille.',	'https://www.youtube.com/embed/pYb18HD79_A',	'../../uploads/melvor.jpg',	1,	12,	1),
(48,	'Nimbatus  The Space Drone Constructor',	'Stray Fawn Studio',	'2020-05-14',	'2020-05-14',	'Vous êtes le Capitaine du Nimbatus – la plus grosse usine mobile de drones jamais conçue. Concevez vos propres drones pour explorer un univers physiquement simulé. Survivez dans différents biomes en créant des passages à l\'aide de vos armes au travers de planètes complètement destructibles, mesurez vous aux drones autonomes construits par d\'autres joueurs ou profitez d\'une totale liberté créative dans le bac à sable.',	'https://www.youtube.com/embed/VE7-gdy8iec',	'../../uploads/nimbatus.jpg',	1,	1,	1),
(49,	'Nine Parchments',	'Frozenbyte',	'2017-12-05',	'2017-12-05',	'Nine Parchments est un jeu d\'action et de magie en coopération développé par Frozenbyte, les créateurs de la série Trine !\r\n\r\nDes apprentis sorciers partent en quête des 9 parchemins pour compléter leurs grimoires.\r\n\r\nComme ils obtiennent vite de puissants sorts sans mémoriser les mesures de sécurité adéquates, leur progression déclenche toutes sortes d\'accidents mortels...\r\n\r\nNine Parchments combine des éléments d\'action - des sorts à lancer en temps réel - et de RPG, comme l\'amélioration du personnage, la collecte de butins magiques et de myriades d\'objets : chapeaux, puissants bâtons.',	'https://www.youtube.com/embed/q1_KvNib1RI',	'../../uploads/nine.jpg',	2,	1,	1),
(50,	'Noita',	'Nolla Games',	'2020-10-15',	'2019-09-24',	'Noita est un roguelite d\'action magique dans un monde où chaque pixel est simulé physiquement. Combattez, explorez, faites fondre, brûlez, gelez et évaporez tout sur votre chemin à travers le monde procédural à l\'aide de sorts que vous aurez créés vous-même. Explorez une grande variété d\'environnements allant des mines de charbon aux déserts de glace, et enfoncez-vous plus profondément à la recherche de mystères inconnus.',	'https://www.youtube.com/embed/0cDkmQ0F0Jw',	'../../uploads/noita.jpg',	3,	12,	1),
(51,	'Northgard',	'Shiro Games',	'2018-03-07',	'2018-03-07',	'Après des années d\'exploration forcenée, de courageux Vikings découvrirent un nouveau continent recelant bien des mystères, dangers et trésors : Northgard.\r\n\r\nLes plus téméraires hissèrent alors les voiles et partirent à la conquête de ces terres inexplorées, en quête de gloire pour leur clan. Par leurs victoires, leur aptitude au commerce ou leur dévotion aux Dieux, ils graveront ainsi leurs noms dans l\'histoire.\r\n\r\nMais il leur faudra pour cela combattre les loups féroces et guerriers morts-vivants qui arpentent ces terres, vaincre des géants colossaux ou s\'allier à eux, et survivre aux hivers les plus rigoureux que le Nord ait connus.',	'https://www.youtube.com/embed/mDN8PHOYnKc',	'../../uploads/northgard.jpg',	2,	18,	1),
(52,	'Outer Wilds',	'Mobius Digital',	'2020-06-18',	'2020-06-18',	'Nommé Game of the Year 2019 par Giant Bomb, Polygon, Eurogamer et The Guardian, acclamé par la critique et récompensé par de nombreux prix, Outer Wilds est un jeu mystérieux en monde ouvert, mettant en scène un système solaire piégé dans une boucle temporelle infinie.\r\n\r\nBienvenue dans le programme spatial !\r\nVous êtes la nouvelle recrue de Outer Wilds Ventures, un récent programme spatial qui enquête sur un étrange système solaire en évolution permanente.\r\n\r\nLes mystères du système solaire...\r\nQu\'est-ce qui se cache au cœur du sinistre Dark Bramble ? Qui a bâti les ruines extraterrestres sur la Lune ? Est-il possible de stopper la boucle temporelle infinie ? Des réponses vous attendent dans les étendues spatiales les plus dangereuses.',	'https://www.youtube.com/embed/d6LGnVCL1_A',	'../../uploads/outer.jpg',	2,	1,	1),
(53,	'Overcooked! 2',	'Ghost Town Games Ltd., Team17',	'2018-08-07',	'2018-08-07',	'Overcooked revient avec une toute nouvelle portion d\'action culinaire chaotique ! Retournez dans le royaume Oignon et réunissez votre équipe de chefs dans ce jeu de coopération locale ou en ligne jusqu\'à 4 joueurs. À vos tabliers... il est l\'heure de sauver le monde (encore une fois !)',	'https://www.youtube.com/embed/gEjbXb_eZcs',	'../../uploads/overcooked.jpg',	2,	1,	1),
(54,	'Oxygen Not Included',	'Klei Entertainment',	'2019-07-30',	'2019-07-30',	'Dans le jeu de simulation de colonie spatiale Oxygen Not Include, vous découvrirez que les pénuries d\'oxygène, de chaleur et de subsistance sont des menaces constantes pour la survie de votre colonie. Guidez les colons à travers les périls de la vie souterraine sur les astéroïdes et observez leur population croître jusqu\'à ce qu\'ils ne se contentent pas de survivre, mais de prospérer...',	'https://www.youtube.com/embed/wcLayGm_pM4',	'../../uploads/oxygen.jpg',	3,	17,	1),
(55,	'Papers, Please',	'Lucas Pope',	'2013-08-08',	'2013-08-08',	'Félicitations !\r\nVotre nom a été sélectionné lors de la loterie du Ministère du Travail du mois d\'octobre.\r\nPour prendre vos fonctions, présentez-vous immédiatement au Ministère des Admissions du poste-frontière de Grestin.\r\nUn appartement de classe 8 vous a été affecté à Grestin Est. Vous pourrez vous y installer avec votre famille.\r\nGloire à l\'Arstotzka.\r\n\r\n\r\nL\'État communiste d\'Arstotzka vient de mettre fin à 6 années de guerre contre son voisin, la Koléchie, récupérant ainsi le secteur de la ville frontière de Grestin qui lui revient de manière légitime.\r\n\r\nVotre tâche, en tant qu\'Inspecteur du service de l\'Immigration, est de contrôler le flux de personnes désirant pénétrer sur le territoire arstotzke depuis la Koléchie. Parmi la multitude d\'immigrants et de visiteurs à la recherche de travail, se cachent contrebandiers, espions et terroristes.\r\n\r\nMuni uniquement des documents présentés par les voyageurs et de l\'équipement rudimentaire d\'inspection, de fouille et de vérification des empreintes digitales fourni par le Ministère des Admissions, c\'est à vous de décider qui recevra l\'autorisation d\'entrer en Arstotzka et qui sera refoulé, voire mis en état d\'arrestation.',	'https://www.youtube.com/embed/_QP5X6fcukM',	'../../uploads/paper.jpg',	3,	3,	1),
(56,	'Project Winter',	'Other Ocean Interactive',	'2019-05-23',	'2019-05-23',	'Trahissez vos amis dans ce multijoueur de 8 personnes concentrées sur la tromperie sociale et la survie.\r\n\r\nLa communication et le travail d’équipe sont essentiels au but ultime de l’évasion des survivants. Rassemblez des ressources, réparez les structures et bravez la nature sauvage ensemble. Attention, il y a des traîtres au sein du groupe qui gagneront de la force au fur et à mesure que le match avance. Le seul objectif des traîtres est d’arrêter les survivants par tous les moyens possibles.',	'https://www.youtube.com/embed/kcX_clkApRo',	'../../uploads/project.jpg',	2,	18,	1),
(57,	'Rebel Inc: Escalation',	'Ndemic Creations',	'2021-10-13',	'2019-10-15',	'Le créateur de Plague Inc: Evolved signe un jeu de simulation politique/militaire stratégique unique et captivant.\r\n\r\nDans Rebel Inc: Escalation, la guerre est \"terminée\", mais on sait tous que ça ne veut rien dire. Afin de stabiliser un pays ravagé par la guerre, vous devez trouver le bon équilibre entre priorités militaires et civiles pour plaire au peuple, tout en empêchant une force insurrectionnelle de s\'emparer du pouvoir !',	'https://www.youtube.com/embed/L-Zwh1dRauA',	'../../uploads/RebelInc.jpg',	1,	18,	1),
(58,	'Risk of Rain 2',	'Hopoo Games',	'2020-08-11',	'2019-03-28',	'SURVIVEZ À UNE PLANÈTE EXTRATERRESTRE\r\nPlus d\'une dizaine d\'environnements réalisés à la main vous attendent, tous remplis de monstres menaçants et de boss titanesques qui n\'ont qu\'un seul but : vous éliminer. Frayez-vous un chemin jusqu\'au boss final et échappez-vous ou bien continuez votre partie indéfiniment pour voir combien de temps vous arriverez à survivre. Grâce à un système de progression évolutive unique, vous et vos adversaires gagnez en puissance de manière continue tout au long d\'une partie.',	'https://www.youtube.com/embed/Qwgq_9EOCTg',	'../../uploads/risk.jpg',	2,	1,	1),
(59,	'Rogue Fable III',	'Pixel Forge Games',	'2021-12-22',	'2018-12-28',	'La légendaire coupe de Yendor, certains disent qu\'elle confère l\'immortalité, mais d\'autres disent que son pouvoir infini vous conduira à la folie. Réputé être en or massif, incrusté de pierres précieuses d\'une beauté et d\'une taille incroyables, il rapportera sûrement une fortune sur le marché noir. De nombreux voleurs et scélérats, attirés par des rêves de richesses sans fin, ont décidé de voler l\'artefact illusoire dans les profondeurs du Donjon de l\'Effroi. Aucun n\'a survécu, serez-vous le premier à réussir ?\r\n\r\nRogue Fable III capture le défi, la tactique, la profondeur et la complexité des roguelikes classiques, mais avec une interface moderne qui minimise la courbe d\'apprentissage pour les nouveaux joueurs et permet aux fans vétérans de roguelike de se mettre rapidement à niveau. Le jeu a été conçu pour être gagnable en moins d\'une heure tout en conservant le gameplay profond et la richesse du contenu pour lesquels le genre est célèbre. Bien que parfois très difficile, chaque course est finalement gagnable et constitue un véritable test des compétences et des connaissances des joueurs.',	'https://www.youtube.com/embed/iT_KE_N9G4Q',	'../../uploads/rogue.jpg',	3,	12,	1),
(60,	'Ruined King: A League of Legends Story™',	'Airship Syndicate',	'2021-11-16',	'2021-11-16',	'Dressez-vous contre la Ruine\r\nContrôlez un groupe de champions de League of Legends, explorez Bilgewater et naviguez jusqu\'aux Îles obscures pour découvrir ce que cache la Brume noire.\r\n\r\nDéveloppé par Airship Syndicate et le légendaire Joe Madureira développeur et dessinateur de bandes dessinées (aussi créateurs de Battle Chaser et Darksiders), Ruined King: A League of Legends Story™ est le premier jeu Riot Forge qui vous permette d\'explorer l\'univers de League of Legends. Dans ce jeu de rôle immersif au tour par tour, vous aurez la possibilité de former votre équipe et de prendre le contrôle de plusieurs champions de League of Legends. Explorez la tumultueuse Bilgewater et les mystérieuses Îles obscures, et découvrez le système d\'initiative des voies.',	'https://www.youtube.com/embed/eUkyg3sUdWc',	'../../uploads/RuinedKing.jpg',	2,	12,	1),
(61,	'Five Nights at Freddy\'s: Security Breach',	'Steel Wool Studios',	'2021-12-17',	'2021-12-17',	'LE PROCHAIN CHAPITRE DE L’HORREUR\r\n\r\nFive Nights at Freddy’s: Security Breach est le dernier volet de la franchise vidéoludique horrifique adulée par des millions de joueurs à travers le monde. Incarnez Gregory, un jeune homme coincé pour la nuit dans le Freddy Fazbear’s Mega Pizzaplex. Avec l’aide de Freddy Fazbear en personne, Gregory doit survivre et échapper aux personnages de Five Nights at Freddy’s (réinventés et rejoints par de toutes nouvelles menaces effroyables) qui le traquent sans relâche.',	'https://www.youtube.com/embed/Wz_MPpsC2xw',	'../../uploads/security.jpg',	2,	1,	1),
(62,	'Settlement Survival',	'Gleamer Studio',	'2021-10-11',	'2021-10-11',	'Dirigez votre peuple dans la création d\'une nouvelle colonie dans ce survival city-builder. Vous devrez fournir à vos citoyens un logement, garantir l\'approvisionnement alimentaire, les protéger contre les menaces de la nature, assurer leur bien-être et leur bonheur et gérer l\'éducation et l\'emploi. Si vous réussissez, vous pourrez même attirer des habitants de villes étrangères !',	'https://www.youtube.com/embed/M9svPXtSjsI',	'../../uploads/SettlementSurvival.jpg',	2,	17,	1),
(63,	'Shakes and Fidget',	'Playa Games GmbH',	'2016-02-24',	'2016-02-24',	'Shakes et Fidget est un RPG fantasy amusant et satyrique, et a même été récompensé ! Tu n\'en reviens pas ? Plus de 50 millions de joueurs ont fait de SFGAME l\'un des jeux en ligne les plus populaires au monde !\r\n\r\n* marque nouvelle mise à jour de la stratégie \"La Forteresse\" et une interface entièrement repensée *\r\n\r\nPersonnalise ton propre héros de bande dessinée et hisse-toi au sommet du Panthéon ! L\'arène JcJ ne se gagnera sûrement pas toute seule avec de vrais joueurs à combattre ! Tes compagnons de guilde t\'aideront à devenir plus fort, plus invincible et à trouver plus de butin épique ! Accepte les quêtes, lance-toi dans des aventures grisantes, monte de niveau, amasse de l\'or, gagne de l\'honneur, sois surpuissant et deviens une légende vivante !',	'https://www.youtube.com/embed/Og6jldIdul4',	'../../uploads/shakes.jpg',	1,	12,	1),
(64,	'Shovel Knight: Treasure Trove',	'Yacht Club Games',	'2014-06-26',	'2014-06-26',	'Shovel Knight: Treasure Trove est l’édition intégrale et complète de Shovel Knight, un classique ébouriffant du jeu d\'action/aventure, doté d\'une jouabilité impressionnante et de personnages mémorables, le tout servi par une esthétique rétro 8 bits. Incarnez Shovel Knight, le chevalier à l’Épelle, et courez, sautez, et combattez afin de l\'aider dans sa quête pour retrouver sa bien-aimée ! Terrassez les méprisables chevaliers de l’Ordre des Sans Quartier et leur menaçante maîtresse, l’Enchanteresse !',	'https://www.youtube.com/embed/bhG02JG7Sns',	'../../uploads/shovel.jpg',	3,	3,	1),
(65,	'Slay the Spire',	'Mega Crit Games',	'2019-01-23',	'2019-01-23',	'En fusionnant les jeux de cartes avec les roguelikes, nous sommes arrivés à créer le jeu de cartes solo le plus intéressant possible. Construisez votre deck, rencontrez toutes sortes d\'ennemis bizarres, découvrez des reliques aux pouvoirs immenses, et éradiquez la tour!',	'https://www.youtube.com/embed/NHRpS2DzIAI',	'../../uploads/slay.jpg',	1,	18,	1),
(66,	'Space Haven',	'Bugbyte Ltd.',	'2020-05-21',	'2020-05-21',	'Embarquez pour l\'espace avec un équipage de colons en quête d\'un nouveau foyer. Créez vos vaisseaux tuile par tuile, optimisez le flux et la qualité de l\'air, gérez les besoins et l\'humeur de votre équipage, rencontrez-en d\'autres, et explorez le cosmos dans ce simulateur de colonie spatiale.',	'https://www.youtube.com/embed/va7XjJk-05o',	'../../uploads/space haven.jpg',	3,	17,	1),
(67,	'Spellcaster University',	'Sneaky Yak Studio',	'2021-06-15',	'2019-09-24',	'Dans Spellcaster University, vous endossez le rôle du directeur d\'une université de magie dans un monde d\'heroic fantasy haut en couleur. Bâtissez votre école, gérez vôtre budget, recrutez des professeurs. En ferez vous un haut lieu de la magie noire, avec les meilleurs professeurs de nécromancie et de démonologie? Ou un lieu en harmonie avec la nature pour entraîner druides et shamans? Ou pourquoi ne pas former des mages aventuriers, en leur proposant des options pour apprendre à se battre et à être discrets? Mais il faudra pour cela survivre aux impitoyables attaques des tribus orcs et aux contrôles du rectorat.',	'https://www.youtube.com/embed/NcsJO_JPSbY',	'../../uploads/spellcaster.jpg',	2,	18,	1),
(68,	'Spiritfarer®: édition Farewell',	'Thunder Lotus Games',	'2020-08-18',	'2020-08-18',	'Spiritfarer® est un jeu de gestion cosy sur le thème de la mort, dans lequel vous incarnez Stella la Navigatrice, une passeuse d’âmes. Construisez un bateau pour explorer le monde, puis liez-vous d’amitié avec les esprits et prenez soin d’eux avant de les mener vers l’au-delà. Cultivez, prospectez, pêchez, récoltez, cuisinez et fabriquez tout ce dont vous aurez besoin pour traverser des mers mystiques. Vous pouvez également incarner Daffodil le chat pour une aventure en mode coopératif à deux joueurs. Partagez des moments privilégiés avec vos défunts passagers, façonnez des souvenirs inoubliables et apprenez comment dire adieu à vos chers amis.\r\n\r\nL\'édition Farewell de Spiritfarer est l\'édition définitive du jeu primé de gestion cosy sur le thème de la mort. Elle inclut le jeu de base tant adoré par près de 1 million de joueurs, et tous les contenus supplémentaires publiés à ce jour. Découvrez pourquoi la critique a désigné Spiritfarer comme l\'un des meilleurs jeux de 2020.',	'https://www.youtube.com/embed/j8Aj3QFQLjQ',	'../../uploads/spirit.jpg',	1,	3,	1),
(69,	'Stardew Valley',	'ConcernedApe',	'2016-02-26',	'2016-02-26',	'Vous avez hérité de l\'ancienne ferme de votre grand-père à Stardew Valley. Armé d\'outils usagés et de quelques pièces de monnaie, vous vous apprêtez à commencer votre nouvelle vie. Pouvez-vous apprendre à vivre de la terre et transformer ces champs envahis en une maison prospère ? Ce ne sera pas facile. Depuis que Joja Corporation est arrivée en ville, les anciens modes de vie ont pratiquement disparu. Le centre communautaire, autrefois le centre d\'activité le plus dynamique de la ville, est maintenant en ruine. Mais la vallée semble pleine d\'opportunités. Avec un peu de dévouement, vous pourriez bien être celui qui restaurera la grandeur de Stardew Valley !',	'https://www.youtube.com/embed/LiWYo-2bq4M',	'../../uploads/stardiewValley.jpg',	3,	17,	1),
(70,	'Steel Division 2',	'Eugen Systems',	'2019-06-20',	'2019-06-20',	'Steel Division 2 repousse les limites du jeu de stratégie en temps réel. Se déroulant sur le Front de l\'Est en 1944, cette suite de Steel Division: Normandy 44, encensé par la critique, vous place aux commandes de toute votre armée durant l\'Opération Bagration, l\'offensive menée par les Soviétiques contre les armées nazies en Biélorussie.\r\n\r\nIncarnez un Général dans des Campagnes Stratégiques Dynamiques au tour par tour à l\'échelle 1:1, glissez-vous dans la peau d\'un Colonel pour des batailles épiques en temps réel ou devenez un Expert en Armement grâce au tout nouveau système de création de Decks.\r\n\r\nAvec plus de 600 unités, 25 cartes tactiques, et de nombreux modes de jeu, Steel Division 2 vous offre une totale liberté d\'action et des heures et des heures de jeu en solo, coop, ou en multijoueur en ligne.',	'https://www.youtube.com/embed/TgFrXX84Tu8',	'../../uploads/steel.jpg',	2,	18,	1),
(71,	'Stoneshard',	'Ink Stains Games',	'2020-02-06',	'2020-02-06',	'Stoneshard est un RPG au tour par tour stimulant qui se déroule dans un monde ouvert. Découvrez la vie impitoyable d\'un mercenaire médiéval : voyagez à travers le royaume déchiré par la guerre, remplissez des contrats, combattez, soignez vos blessures et développez votre personnage sans aucune restriction.',	'https://www.youtube.com/embed/xwPAr4V3oK0',	'../../uploads/stoneshard.jpg',	3,	12,	1),
(72,	'Surviving the Aftermath',	'Iceflake Studios',	'2021-11-16',	'2020-10-22',	'Survivez et prospérez dans un avenir post-apocalyptique : les ressources sont rares, mais les possibilités, infinies! Construisez une colonie à l\'épreuve des catastrophes, protégez vos colons et restaurez la civilisation dans un monde dévasté.\r\n\r\nQuittez votre colonie et explorez des territoires désolés pour récupérer des ressources, rencontrer des colonies rivales et découvrir des secrets.',	'https://www.youtube.com/embed/HpNIK_e5qy0',	'../../uploads/surviving.jpg',	1,	19,	1),
(73,	'Totally Accurate Battle Simulator',	'Landfall',	'2021-04-01',	'2019-04-01',	'Dirigez des personnages flageolants bleus et rouges venant de terres anciennes, de lieux effrayants et de mondes fantastiques. Admirez-les se battre dans des simulations où la physique est totalement bancale.\r\n\r\nSi vous finissez par en avoir marre des plus de 100 personnages à votre disposition, vous pouvez toujours en créer des nouveaux dans le créateur d\'unité.\r\n\r\nVous pouvez également envoyer vos personnages se battre contre vos amis ou des inconnus dans le mode multijoueur en ligne!',	'https://www.youtube.com/embed/ah6OVetEmFQ',	'../../uploads/tabs.jpg',	2,	18,	1),
(74,	'Tavern Master',	'Untitled Studio, WhisperGames',	'2021-11-16',	'2021-11-16',	'Concevez et construisez votre propre taverne médiévale !\r\nTavern Master est un jeu de gestion de taverne médiévale où vous êtes en charge de la construction, de l\'entretien et de la gestion de votre propre taverne !\r\n\r\nAchetez des tables et des bancs, remplissez des barils de boissons, embauchez du personnel et vous serez prêt à servir vos premiers clients. Assurez-vous que vos employés sont heureux, qu\'il y a assez de boissons et de places pour les clients et bientôt vous pourrez développer votre entreprise de différentes manières.',	'https://www.youtube.com/embed/yfbvHntRTX0',	'../../uploads/TavernMaster.jpg',	2,	17,	1),
(75,	'Terraria',	'Re-Logic',	'2011-05-16',	'2011-05-16',	'Creuser, survivre, explorer, construire ! Tout est possible dans ce jeu d\'aventure bourré d\'action. Le monde est votre toile et le sol votre peinture.\r\nPrenez vos outils, et c\'est parti ! Fabriquez des armes pour lutter contre toutes sortes d\'ennemis. Creusez en profondeur pour trouver des accessoires, de l\'argent et plein d\'autres objets qui pourront vous être utiles. Partez à la recherche de matériaux pour fabriquer tout ce qu\'il vous faut pour créer votre propre monde. Construisez une maison, un fort ou pourquoi pas un château. Des gens s\'installeront et vendront peut-être même leurs services pour vous aider dans votre voyage.\r\nAttention, ce n\'est pas tout, d\'autres défis vous attendent... Êtes-vous prêt à vous retrousser les manches ?',	'https://www.youtube.com/embed/w7uOhFTrrq0',	'../../uploads/terraria.jpg',	3,	12,	1),
(76,	'Townscaper',	'Oskar Stålberg',	'2021-08-26',	'2020-06-30',	'Construisez des villes pittoresques avec des rues sinueuses. Construisez de petits hameaux, des cathédrales planantes, des réseaux de canaux ou des villes célestes sur des pilotis. Bloc par bloc.\r\n\r\nAucun but. Ni de vrai gameplay. Juste beaucoup de bâtiments et beaucoup de beauté. C\'est tout.\r\n\r\nTownscaper est un projet de passionné expérimental. Plus un jouet qu\'un jeu vidéo. Choisissez des couleurs dans la palette, détruisez des blocs de maison colorés sur la grille irrégulière et regardez l\'algorithme sous-jacent de Townscaper transformer automatiquement ces blocs en de jolies petites maisons, arches, escaliers, ponts et arrière-cours luxuriantes, selon leur configuration',	'https://www.youtube.com/embed/QtVkteAS15M',	'../../uploads/town.jpg',	2,	17,	1),
(77,	'Tribes of Midgard',	'Norsfell',	'2021-07-27',	'2021-07-27',	'Saison 2 : la Saga du Serpent est disponible et vous forcera, votre tribu et vous, à affronter les dangers des mers inexplorées ! Voguez vers de nouveaux horizons afin de découvrir des îles inédites et d\'affronter leurs féroces habitants. Mais prenez garde... un nouveau Boss de Saga vous attend si vous réussissez à percer les secrets de son antre. Équipez de nouvelles runes puissantes, brandissez fièrement vos nouvelles armes et armures et mettez à profit vos nouveaux talents de nageur pour relever ces nouveaux défis et remporter les récompenses de cette saison inédite !',	'https://www.youtube.com/embed/FpNeJP2SAJU',	'../../uploads/tribes.jpg',	2,	3,	1),
(78,	'Trine Enchanted Edition',	'Frozenbyte',	'2009-07-02',	'2009-07-02',	'Trine est un jeu de réflexion où le joueur peut créer et utiliser des objets pour résoudre des énigmes et combattre des ennemis. Le jeu se déroule dans un environnement de châteaux-forts où trois héros sont liés par le Trine pour délivrer le royaume du mal .\r\nLe jeu est basé sur des interactions physiques virtuelles. Chaque personnage dispose de pouvoirs spéciaux pour lutter contre les armées de zombies et les nombreux pièges. Le joueur peut choisir le personnage qui conviendra le mieux pour chaque épreuve. Le magicien peut faire des invocations et créer de nouveaux chemins, le voleur peut utiliser son agilité et sa précision et le chevalier peut utiliser son pouvoir destructeur et sa force pour assurer la victoire.',	'https://www.youtube.com/embed/H4sMJdAP2-4',	'../../uploads/trine.jpg',	2,	1,	1),
(79,	'Trine 2: Complete Story',	'Frozenbyte',	'2013-06-06',	'2013-06-06',	'Trine 2 est un jeu d\'action, d\'énigmes et de plateforme à défilement horizontal où vous incarnez l\'un des Trois Héros qui tracent leur chemin à travers d\'innombrables dangers, dans un univers fantastique de conte de fée.',	'https://www.youtube.com/embed/-6lYPZ27C4c',	'../../uploads/trine2.jpg',	2,	1,	1),
(80,	'Undying',	'Vanimals',	'2021-10-19',	'2021-10-19',	'Infectée par une morsure de zombie, les jours d\'Anling sont comptés. Elle doit désormais se battre pour survivre, pas pour elle-même, mais pour son jeune fils, Cody. Garantissez la survie de Cody dans un monde infesté de zombies, en le protégeant et en lui apprenant des compétences précieuses.\r\n\r\nDans ce jeu de survie émouvant, incarnez Anling dont le but est de s\'assurer que son fils, Cody, soit en sécurité et puisse vivre après sa transformation. Vous devrez gérer des ressources limitées afin de ralentir l\'infection d\'Anling tout en faisant en sorte qu\'elle et Cody ne meurent pas de faim ou de soif.\r\n\r\nAnling doit également apprendre à son fils les compétences de base de survie telles que la cuisine, la fabrication et le combat avant qu\'elle ne commence à disparaître. Elle va découvrir que dans certaines situations, c\'est elle qui va commencer à dépendre de lui.\r\n\r\nUn équilibre parfait entre la gestion de vos journées à chercher des ressources et l\'amélioration des compétences de Cody sera nécessaire pour survivre à ce long voyage.',	'https://www.youtube.com/embed/zwGKUAgcld8',	'../../uploads/Undying.jpg',	2,	19,	1),
(81,	'The Unfinished Swan',	'Giant Sparrow',	'2020-09-10',	'2020-09-10',	'Par les créateurs de What Remains of Edith Finch.\r\n\r\nDans The Unfinished Swan, explorez et découvrez un mystérieux paysage entièrement blanc en l’éclaboussant de couleurs. Vous incarnerez Monroe, un jeune orphelin de 10 ans, et suivrez un cygne sorti d’un tableau inachevé jusque dans un royaume fantastique tout droit tiré d’un livre d’histoires. Chaque chapitre renferme son lot de surprises, de façons d’explorer le monde, de créatures bizarres (et parfois dangereuses) et de rencontres avec le roi excentrique à l’origine de cet empire.',	'https://www.youtube.com/embed/xFfteZaAXq4',	'../../uploads/unfinished.jpg',	2,	3,	1),
(82,	'Unpacking',	'Witch Beam',	'2021-11-02',	'2021-11-02',	'Unpacking est un jeu zen sur l\'expérience familière de sortir ses affaires de cartons et de les placer dans une nouvelle maison. Moitié puzzle de placement de blocs, moitié décoration d\'intérieur, venez créer un espace de vie agréable tout en découvrant des indices sur la vie que vous déballez. Au fil des huit déménagements dans de nouvelles maisons, vous aurez l\'opportunité de vivre un sentiment d\'intimité avec un personnage que vous ne verrez jamais et une histoire dont vous ne savez rien.',	'https://www.youtube.com/embed/_BG98e_w6d0',	'../../uploads/Unpacking.jpg',	1,	17,	1),
(83,	'Wartales',	'Shiro Games',	'2021-12-01',	'2021-12-01',	'Un siècle s\'est écoulé depuis l\'épidémie sans précédent qui a dévasté l\'empire d\'Edoran et entraîné sa chute. Depuis, ces terres sont en proie au tumulte et à l\'instabilité. Mercenaires, bandits de grand chemin et autres voleurs arpentent désormais routes et villes, et toute notion d\'honneur n\'est plus qu’un lointain souvenir.\r\n\r\nL\'heure est venue pour vous de mener un groupe de personnages sans foi ni loi à travers un immense monde ouvert où les combats, la mort et la soif de richesses façonneront votre quotidien. Vous n\'incarnez ni un individu hors norme, ni un élu, et encore moins un héros destiné à rétablir la paix. Votre seul et unique objectif : survivre et prospérer dans un monde hostile.\r\n\r\nSeuls les plus courageux et les plus ambitieux peuvent espérer graver leur nom dans l\'histoire de Wartales !',	'https://www.youtube.com/embed/68L5J9bDYsg',	'../../uploads/wartales.jpg',	2,	12,	1),
(84,	'WorldBox God Simulator',	'Maxim Karpenko',	'2021-12-02',	'2021-12-02',	'WorldBox est le simulateur ULTIME de dieu et un jeu sandbox!\r\nCréez votre propre monde ou détruisez-le en utilisant différents pouvoirs :\r\nSimulateur de Dieu. Il y a beaucoup de pouvoirs dans votre boîte à outils qui peuvent être utilisés sans mana ou ressources.\r\nMonde vivant. Les créatures ont des caractères et des besoins. Les animaux vont chercher de la nourriture. Les rois cupides essaieront d\'obtenir plus de terres.',	'https://www.youtube.com/embed/9RzAgcnK-fU',	'../../uploads/world box.jpg',	3,	16,	1),
(85,	'Youtubers Life',	'UPLAY Online',	'2016-05-18',	'2016-05-18',	'Youtubers Life est le jeu vidéo ultime de simulation/gestion dans lequel vous devenez le plus grand créateur de contenu de l\'histoire en éditant des vidéos, en augmentant le nombre de fans et en devenant riche. Créez votre personnage et commencez à réaliser vos premières diffusions dans votre chambre chez vos parents où vous avez grandi. Gardez un œil sur vos tâches quotidiennes et socialisez pour augmenter votre popularité tout en gérant vos fans, vos amis, votre famille et la gestion du temps !',	'https://www.youtube.com/embed/1gMRmw6C7jw',	'../../uploads/youtubers.jpg',	2,	3,	1),
(86,	'Zombie Grinder',	'TwinDrills',	'2015-10-16',	'2015-10-16',	'Zombie Grinder est un jeu multijoueur multiplateforme qui propose une variété de modes de jeu différents à apprécier avec des amis, à la fois localement et en ligne. Vous pouvez vous frayer un chemin à travers de nombreuses cartes, modes de jeu et ennemis différents - Avec des tonnes d\'armes et d\'options de personnalisation !\r\n\r\nLa coopération\r\nPrend en charge à la fois la coopération en écran partagé local (et l\'écran partagé si en mode pvp), la coopération en ligne et même la possibilité de mélanger les deux - amenant plusieurs joueurs locaux dans les jeux en ligne !\r\n\r\nUne assistance est disponible pour le chat en jeu à l\'échelle de la communauté mondiale, le chat en jeu local et le chat vocal pour faciliter la coopération et la mise en place de matchs !',	'https://www.youtube.com/embed/XWGkwVyH1Og',	'../../uploads/zombie.jpg',	3,	1,	1),
(87,	'Project Zomboid',	'The Indie Stone',	'2013-11-08',	'2013-11-08',	'Project Zomboid est un bac à sable ouvert infesté de zombies. Il pose une question simple : comment allez-vous mourir ?\r\n\r\nDans les villes de Muldraugh et West Point, les survivants doivent piller les maisons, construire des défenses et faire tout leur possible pour retarder jour après jour leur mort inévitable. Aucune aide ne vient - leur survie dépend de leur propre ruse, de leur chance et de leur capacité à échapper à une horde implacable.',	'https://www.youtube.com/embed/4eBy0woHWjA',	'../../uploads/zomboid.jpg',	2,	19,	1),
(88,	'Zorya: The Celestial Sisters ™',	'Madlife Divertissement',	'2022-02-08',	'2022-02-08',	'Perdue sur terre après une série d’événements malheureux, Aysu, déesse de la nuit, doit retrouver son chemin vers le ciel! Aidée par sa sœur Solveig, déesse du soleil, Aysu doit retrouver ses pouvoirs dispersés sur les terres glacées de Vyraj tout en restant dans l\'ombre pour survivre.\r\n\r\nEmbarquez dans une aventure remplie de casse-têtes où vous et votre partenaire devez prouver que vous pouvez communiquer et collaborer pour récupérer les pouvoirs d\'Aysu.',	'https://www.youtube.com/embed/XIGWf6JsBwY',	'../../uploads/Zorya.jpg',	2,	18,	1),
(89,	'Roadwarden',	'Moral Anxiety Studio',	'2022-05-01',	'2022-05-01',	'Qui ou qu\'est-ce qu\'un Roadwarden ?\r\nVous êtes un Roadwarden, un brave étranger qui met sa vie en danger pour faire une différence dans un sombre monde imaginaire. Alors que la plupart des gens ne risqueraient jamais un voyage solitaire à travers les parties les plus sauvages du pays, vous acceptez volontiers la lutte. Vous gardez les voyageurs, reliez des villages isolés, soutenez les marchands et repoussez les créatures attaquantes, les bandits ou même les morts-vivants.',	'https://www.youtube.com/embed/nHHfwGZb_c0',	'../../uploads/Roadwarden.jpg',	3,	3,	1),
(90,	'Kingdom of the Dead',	'DIRIGO GAMES',	'2022-02-10',	'2022-02-10',	'KINGDOM of the DEAD est un jeu vidéo d\'horreur en FPS dessiné à la plume et à l\'encre. Vous incarnez l\'Agent Chamberlain, un ancien professeur reconverti en général d\'armée, désormais au service d\'un programme gouvernemental secret connu sous le nom de GATEKEEPER, dont l\'objectif principal est de vaincre les armées de Death.',	'https://www.youtube.com/embed/wRSrJfEWvv4',	'../../uploads/KingdomofDead.jpg',	2,	1,	1),
(91,	'Replaced',	'Sad Cat Studios',	'2022-06-01',	'2022-06-01',	'REPLACED est un jeu de plateformes et de science-fiction rétrofuturiste en 2,5D se déroulant dans une Amérique alternative des années 80, avec des combats fluides sur fond d’histoire dystopique !\r\n\r\nVous incarnez R.E.A.C.H., une intelligence artificielle prise au piège dans un corps humain contre son gré et s’efforçant de s’adapter à la vie humaine dans la ville de Phoenix et ses alentours.\r\n\r\nDans une société défaillante plongée dans le chaos après une catastrophe nucléaire, les rues sont envahies par les hors-la-loi. La corruption et la cupidité règnent en maître, et pour les puissants, les humains et leurs organes ne sont qu’une monnaie d’échange. REPLACED se joue en solo et offre un mélange de gameplay sur plateformes et de pixel art avec des effets cinématiques et des combats fluides.\r\n\r\nL’histoire dystopique riche et captivante se déroule dans un passé alternatif, dans un monde aride, complexe et stylisé d’inspiration cyberpunk.\r\n\r\nSous les traits de R.E.A.C.H., vous explorez et révélez les mystères de ce monde, en comprenant progressivement que tout a un prix.',	'https://www.youtube.com/embed/Ti1DtNuXFoE',	'../../uploads/replaced.jpg',	3,	3,	1);

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
(1,	'Français'),
(2,	'Anglais'),
(3,	'Italien'),
(4,	'Allemand'),
(5,	'Espagnol-Espagne'),
(6,	'Russe'),
(7,	'Tchèque'),
(8,	'Japonais'),
(9,	'Coréen'),
(10,	'Polonais'),
(11,	'Portugais du Brésil');

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

