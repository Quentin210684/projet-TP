<?php

$game = new games;

$gamesListIndex = $game->getGamesListHome();
$gameNew = $game->getGamesListHomeNews();
$gameCarousel = $game->getGamesListHomeCarousel();
$gameCarouselLastId = $game->getGamesLastId();
