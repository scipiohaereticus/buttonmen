<?php

require_once "engine/BMGame.php";

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2012-12-11 at 13:27:50.
 */
class BMGameTest extends PHPUnit_Framework_TestCase {

    /**
     * @var BMGame
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new BMGame;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_start_game() {
        // the first player always has to be set before advancing the game
        $this->object->gameState = BMGameState::startGame;
        try {
            $this->object->do_next_step();
        }
        catch (UnexpectedValueException $expected) {
        }

        // players other than the first can be unspecified
        $this->object->gameState = BMGameState::startGame;
        $this->object->playerIdxArray = array(123, 0);
        $this->object->do_next_step();

        // buttons can be unspecified
        $this->object->gameState = BMGameState::startGame;
        $this->object->playerIdxArray = array(123, 456);
        $this->object->do_next_step();

    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_apply_handicaps() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_choose_auxiliary_dice() {
        $this->object->gameState = BMGameState::chooseAuxiliaryDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $recipe1 = '(4) (8) (12) (30)';
        $recipe2 = '(6) (12) (20) (20)';
        $button1->load_from_recipe($recipe1);
        $button2->load_from_recipe($recipe2);
        $this->object->buttonArray = array($button1, $button2);
        $this->object->do_next_step();
        $this->assertEquals($recipe1, $this->object->buttonArray[0]->recipe);
        $this->assertEquals($recipe2, $this->object->buttonArray[1]->recipe);

        $this->object->gameState = BMGameState::chooseAuxiliaryDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $recipe1 = '(4) (8) (12) +(30)';
        $recipe2 = '(6) (12) (20) (20)';
        $button1->load_from_recipe($recipe1);
        $button2->load_from_recipe($recipe2);
        $this->object->buttonArray = array($button1, $button2);
        $this->object->do_next_step();
        $this->assertEquals('(4) (8) (12) (30)', $this->object->buttonArray[0]->recipe);
        $this->assertEquals('(6) (12) (20) (20) (30)', $this->object->buttonArray[1]->recipe);

        $this->object->gameState = BMGameState::chooseAuxiliaryDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $recipe1 = '(4) (8) (12) +(30)';
        $recipe2 = '(6)+ (12) (20) (20)';
        $button1->load_from_recipe($recipe1);
        $button2->load_from_recipe($recipe2);
        $this->object->buttonArray = array($button1, $button2);
        $this->object->do_next_step();
        $this->assertEquals('(4) (8) (12) (30) (6)', $this->object->buttonArray[0]->recipe);
        $this->assertEquals('(12) (20) (20) (30) (6)', $this->object->buttonArray[1]->recipe);
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_load_dice_into_buttons() {
        //$this->object->buttonArray
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_specify_dice() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_add_available_dice_to_game() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_determine_initiative() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_start_round() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_start_turn() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_end_turn() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_end_round() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_end_game() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BMGame::do_next_step
     */
    public function test_do_next_step_undefined() {
        unset($this->object->gameState);
        try {
            $this->object->do_next_step();
        }
        catch (LogicException $expected) {
        }
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_start_game() {
        $this->object->gameState = BMGameState::startGame;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startGame, $this->object->gameState);

        // default unspecified playerIdxArray
        $this->object->gameState = BMGameState::startGame;
        $Button1 = new BMButton;
        $Button2 = new BMButton;
        $this->object->buttonArray = array($Button1, $Button2);
        $this->object->maxWins = 3;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startGame, $this->object->gameState);

        $this->object->gameState = BMGameState::startGame;
        $this->object->playerIdxArray = array(12345, 54321);
        $Button1 = new BMButton;
        $Button2 = new BMButton;
        $this->object->buttonArray = array($Button1, $Button2);
        $this->object->maxWins = 3;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::applyHandicaps, $this->object->gameState);
        $this->assertEquals(array(FALSE, FALSE), $this->object->passStatusArray);
        $this->assertEquals(array(array(0, 0, 0), array(0, 0, 0)),
                            $this->object->gameScoreArray);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_apply_handicaps() {
        $this->object->gameState = BMGameState::applyHandicaps;
        unset($this->object->maxWins);
        try {
            $this->object->update_game_state();
        }
        catch (LogicException $expected) {
        }

        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->gameState = BMGameState::applyHandicaps;
        $this->object->maxWins = 3;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::applyHandicaps,
                            $this->object->gameState);

        $this->object->playerIdxArray = array('12345', '54321');
        $this->object->gameState = BMGameState::applyHandicaps;
        $this->object->gameScoreArray = array(array(0, 0, 0),array(0, 0, 0));
        $this->object->maxWins = 3;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::chooseAuxiliaryDice,
                            $this->object->gameState);

        $this->object->playerIdxArray = array('12345', '54321');
        $this->object->gameState = BMGameState::applyHandicaps;
        $this->object->gameScoreArray = array(array(3, 0, 0),array(0, 3, 0));
        $this->object->maxWins = 3;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endGame, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_choose_auxiliary_dice() {
        $this->object->gameState = BMGameState::chooseAuxiliaryDice;
        $button1 = new BMButton;
        $button1->recipe = '(4) (8) (12) (20)';
        if (isset($button1->dieArray)) {
            unset($button1->dieArray);
        }
        $button2 = new BMButton;
        $button2->recipe = '(4) (4) (4) (20)';
        if (isset($button2->dieArray)) {
            unset($button2->dieArray);
        }

        $this->object->buttonArray = array($button1, $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::loadDiceIntoButtons, $this->object->gameState);

        $button3 = new BMButton;
        $button3->recipe = '(4) (4) (8) +(20)';
        if (isset($button3->dieArray)) {
            unset($button3->dieArray);
        }

        $this->object->gameState = BMGameState::chooseAuxiliaryDice;
        $this->object->buttonArray = array($button1, $button3);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::chooseAuxiliaryDice,
                            $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_load_dice_into_buttons() {
        $this->object->gameState = BMGameState::loadDiceIntoButtons;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $button1->load_from_recipe('(4) (8) (12) (20)');
        $button2->load_from_recipe('(4) (12) (20) (X)');
        $this->object->buttonArray = array($button1, new $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::loadDiceIntoButtons, $this->object->gameState);

        $this->object->gameState = BMGameState::loadDiceIntoButtons;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $button1->load_from_recipe('(4) (8) (12) (20)');
        $button2->load_from_recipe('(4) (12) (20) (X)');
        $this->object->buttonArray = array($button1, $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::specifyDice, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_specify_dice() {
        $this->object->gameState = BMGameState::specifyDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $button1->load_from_recipe('(4) (8) (12) (20)');
        $button2->load_from_recipe('(4) (12) (20) (20)');
        $this->object->buttonArray = array($button1, $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::addAvailableDiceToGame,
                            $this->object->gameState);

        $this->object->gameState = BMGameState::specifyDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $button1->load_from_recipe('(4) (8) (12) (20)');
        $button2->load_from_recipe('(4) (12) (20) (X)');
        $this->object->buttonArray = array($button1, $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::specifyDice, $this->object->gameState);

        $this->object->gameState = BMGameState::specifyDice;
        $button1 = new BMButton;
        $button2 = new BMButton;
        $button1->load_from_recipe('(4) (8) (12) (20)');
        $button2->load_from_recipe('(4) (12) (20) (4/12)');
        $this->object->buttonArray = array($button1, $button2);
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::specifyDice, $this->object->gameState);
    }

    public function test_update_game_state_add_available_dice_to_game() {
        $this->object->gameState = BMGameState::addAvailableDiceToGame;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::addAvailableDiceToGame,
                            $this->object->gameState);

        $this->object->gameState = BMGameState::addAvailableDiceToGame;
        $die1 = new BMDie;
        $die2 = new BMDie;
        $die3 = new BMDie;
        $die4 = new BMDie;
        $this->object->activeDieArrayArray = array(array($die1, $die2),
                                                   array($die3, $die4));
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::determineInitiative,
                            $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_determine_initiative() {
        $this->object->gameState = BMGameState::determineInitiative;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::determineInitiative,
                            $this->object->gameState);

        $this->object->gameState = BMGameState::determineInitiative;
        $this->object->playerWithInitiativeIdx = 0;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startRound, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_start_round() {
        $this->object->gameState = BMGameState::startRound;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startRound, $this->object->gameState);

        $this->object->gameState = BMGameState::startRound;
        $this->object->activePlayerIdx = 0;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startTurn, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_start_turn() {
        $this->object->gameState = BMGameState::startTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startTurn, $this->object->gameState);

        $this->object->gameState = BMGameState::startTurn;
        $this->object->attack = array(array(), array(), '');
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endTurn, $this->object->gameState);
        //james: need to check that the attack has been carried out
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_end_turn() {
        $die1 = new BMDie;
        $die2 = new BMDie;

        // both players still have dice and both have not passed
        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->activeDieArrayArray = array(array($die1),
                                                   array($die2));
        $this->object->passStatusArray = array(FALSE, FALSE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startTurn, $this->object->gameState);
        $this->assertTrue(isset($this->object->activeDieArrayArray));
        $this->assertEquals(array(FALSE, FALSE), $this->object->passStatusArray);

        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->activeDieArrayArray = array(array($die1),
                                                   array($die2));
        $this->object->passStatusArray = array(TRUE, FALSE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startTurn, $this->object->gameState);
        $this->assertTrue(isset($this->object->activeDieArrayArray));
        $this->assertEquals(array(TRUE, FALSE), $this->object->passStatusArray);

        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->activeDieArrayArray = array(array($die1),
                                                   array($die2));
        $this->object->passStatusArray = array(FALSE, TRUE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::startTurn, $this->object->gameState);
        $this->assertTrue(isset($this->object->activeDieArrayArray));
        $this->assertEquals(array(FALSE, TRUE), $this->object->passStatusArray);

        // both players have passed
        $this->object->activeDieArrayArray = array(array($die1),
                                                   array($die2));
        $this->object->passStatusArray = array(TRUE, TRUE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endRound, $this->object->gameState);

        // the first player has no dice
        $this->object->activeDieArrayArray = array(array($die1),
                                                   array());
        $this->object->passStatusArray = array(FALSE, FALSE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endRound, $this->object->gameState);

        // the second player has no dice
        $this->object->activeDieArrayArray = array(array(),
                                                   array($die2));
        $this->object->passStatusArray = array(FALSE, FALSE);
        $this->object->gameState = BMGameState::endTurn;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endRound, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_end_round() {
        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->activePlayerIdx = 0;
        $die1 = new BMDie;
        $die2 = new BMDie;
        $this->object->activeDieArrayArray = array(array($die1), array($die2));
        $this->object->passStatusArray = array(TRUE, TRUE);
        $this->object->maxWins = 3;
        $this->object->gameScoreArray = array(array(1,2,1),
                                              array(2,1,1));
        $this->object->gameState = BMGameState::endRound;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::loadDiceIntoButtons, $this->object->gameState);
        $this->assertFalse(isset($this->object->activePlayerIdx));
        $this->assertFalse(isset($this->object->activeDieArrayArray));
        $this->assertEquals(array(FALSE, FALSE), $this->object->passStatusArray);

        $this->object->maxWins = 5;
        $this->object->gameScoreArray = array(array(5,2,1),
                                              array(2,5,1));
        $this->object->gameState = BMGameState::endRound;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endGame, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_end_game() {
        $this->object->gameState = BMGameState::endGame;
        $this->object->update_game_state();
        $this->assertEquals(BMGameState::endGame, $this->object->gameState);
    }

    /**
     * @covers BMGame::update_game_state
     */
    public function test_update_game_state_not_set() {
        try {
            $this->object->update_game_state();
            $this->fail('An undefined game state cannot be updated.');
        }
        catch (LogicException $expected) {
        }
    }

    /**
     * @covers BMGame::does_recipe_have_auxiliary_dice
     */
    public function test_does_recipe_have_auxiliary_dice() {
        $this->assertFalse(BMGame::does_recipe_have_auxiliary_dice('(4) (8) (12) (20)'));

        $this->assertTrue(BMGame::does_recipe_have_auxiliary_dice('(4) (8) (12) +(20)'));
    }

    /**
     * @covers BMGame::separate_out_auxiliary_dice
     */
    public function test_separate_out_auxiliary_dice() {
        $recipe = '(4) (12) (16) (20)';
        $this->assertEquals(array($recipe, ''),
                            BMGame::separate_out_auxiliary_dice($recipe));

        $recipe = '(4) +(12) (16) (20)+';
        $this->assertEquals(array('(4) (16)', '(12) (20)'),
                            BMGame::separate_out_auxiliary_dice($recipe));
    }

    /**
     * @covers BMGame::is_die_specified
     */
    public function test_is_die_specified() {
        // normal die
        $die = new BMDie;
        $die->mSides = '12';
        $die->mSkills = '';
        $this->assertTrue(BMGame::is_die_specified($die));

        // swing die
        $die = new BMDie;
        $die->mSides = 'X';
        $die->mSkills = '';
        $this->assertFalse(BMGame::is_die_specified($die));

        // option die
        $die = new BMDie;
        $die->mSides = '8/12';
        $die->mSkills = '';
        $this->assertFalse(BMGame::is_die_specified($die));
    }

    /**
     * @covers BMGame::is_valid_attack
     */
    public function test_is_valid_attack() {
        $method = new ReflectionMethod('BMGame', 'is_valid_attack');
        $method->setAccessible(TRUE);

        // check when there is no attack set
        $this->assertFalse($method->invoke($this->object));

        // check with a pass attack
        $this->object->attack = array(array(), array(), '');
        $this->assertTrue($method->invoke($this->object));

        // james: need to add test cases for invalid attacks
    }

    /**
     * @covers BMGame::reset_play_state
     */
    public function test_reset_game_state() {
        $method = new ReflectionMethod('BMGame', 'reset_play_state');
        $method->setAccessible(TRUE);

        $this->object->playerIdxArray = array(12345, 54321);
        $this->object->activePlayerIdx = 1;
        $this->object->playerWithInitiativeIdx = 0;

        $die1 = new BMDie;
        $die2 = new BMDie;
        $BMDie3 = new BMDie;
        $BMDie4 = new BMDie;

        $this->object->activeDieArrayArray = array(array($die1), array($die2));
        $this->object->passStatusArray = array(TRUE, TRUE);
        $this->object->capturedDieArrayArray = array(array($BMDie3), array($BMDie4));
        $this->object->roundScoreArray = array(40, -25);

        $method->invoke($this->object);
        $this->assertFalse(isset($this->object->activePlayerIdx));
        $this->assertFalse(isset($this->object->playerWithInitiativeIdx));
        $this->assertFalse(isset($this->object->activeDieArrayArray));
        $this->assertEquals(array(FALSE, FALSE), $this->object->passStatusArray);
        $this->assertEquals(array(array(), array()), $this->object->capturedDieArrayArray);
        $this->assertFalse(isset($this->object->roundScoreArray));
    }

    /**
     * @covers BMGame::update_active_player
     */
    public function test_update_active_player() {
        $method = new ReflectionMethod('BMGame', 'update_active_player');
        $method->setAccessible(TRUE);

        $game = new BMGame(1234,
                           array(1, 12, 21, 3, 15),
                           array('', '', '', '', ''),
                           3);
        $game->activePlayerIdx = 0;
        $method->invoke($game);
        $this->assertEquals(1, $game->activePlayerIdx);
        $method->invoke($game);
        $this->assertEquals(2, $game->activePlayerIdx);
        $method->invoke($game);
        $this->assertEquals(3, $game->activePlayerIdx);
        $method->invoke($game);
        $this->assertEquals(4, $game->activePlayerIdx);
        $method->invoke($game);
        $this->assertEquals(0, $game->activePlayerIdx);
    }

    /**
     * @covers BMGame::__construct
     */
    public function test__construct() {
        // construct default empty game
        $game = new BMGame;
        $this->assertEquals(0, $game->gameId);
        $this->assertEquals(array(0, 0), $game->playerIdxArray);
        $this->assertEquals('', $game->buttonArray[0]->recipe);
        $this->assertEquals('', $game->buttonArray[1]->recipe);
        $this->assertEquals(3, $game->maxWins);

        // construct valid game
        $gameId = 2745;
        $playerIdxArray = array(123, 456);
        $buttonRecipeArray = array('(4) (8) (12) (20)', '(4) (4) (4) (20)');
        $maxWins = 5;
        $game = new BMGame($gameId, $playerIdxArray, $buttonRecipeArray, $maxWins);
        $this->assertEquals($playerIdxArray, $game->playerIdxArray);
        $this->assertEquals($buttonRecipeArray[0], $game->buttonArray[0]->recipe);
        $this->assertEquals($buttonRecipeArray[1], $game->buttonArray[1]->recipe);
        $this->assertEquals($maxWins, $game->maxWins);

        // construct invalid game
        $gameId = 2745;
        $playerIdxArray = array(123, 456, 789);
        $buttonRecipeArray = array('(4) (8) (12) (20)', '(4) (4) (4) (20)');
        $maxWins = 5;
        try {
            $game = new BMGame($playerIdxArray, $buttonRecipeArray, $maxWins);
            $this->fail('The number of buttons must equal the number of players.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__get
     */
    public function test__get() {
        // check that a nonexistent property can be gotten gracefully
        $this->assertEquals(NULL, $this->object->nonsenseVariable);

        $die1 = new BMDie;
        $die2 = new BMDie;
        $this->object->buttonArray = array($die1, $die2);
        $this->assertEquals(array($die1, $die2), $this->object->buttonArray);
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_game_id() {
        // valid set
        $this->object->gameId = 235;

        // invalid set
        try {
            $this->object->gameId = 'abc';
            $this->fail('The game ID must be a non-negative integer.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_player_idx_array() {
        $game = new BMGame(12345, array(123, 456), array('', ''), 3);

        // valid set
        $game->playerIdxArray = array(345, 567);

        // invalid set
        try {
            $game->playerIdxArray = array(123, 345, 567);
            $this->fail('The number of players cannot change during a game.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_active_player_idx() {
        $game = new BMGame(12345, array(123, 456), array('', ''), 3);

        // valid set
        $game->activePlayerIdx = 0;

        // invalid set
        try {
            $game->activePlayerIdx = 6;
            $this->fail('The active player index must be a valid index.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_player_with_initiative_idx() {
        $game = new BMGame(12345, array(123, 456), array('', ''), 3);

        // valid set
        $game->playerWithInitiativeIdx = 0;

        // invalid set
        try {
            $game->playerWithInitiativeIdx = 6;
            $this->fail('The index of the player with initiative must be valid.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }


    /**
     * @covers BMGame::__set
     */
    public function test__set_button_array() {
        $game = new BMGame(12345, array(123, 456), array('', ''), 3);

        // valid set
        $game->buttonArray = array('p(23)', 's(58)');

        // invalid set
        try {
            $game->buttonArray = array('', '', '');
            $this->fail('The number of buttons must match the number of players.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_game_score_array() {
        $this->object->playerIdxArray = array(12345, 54321);
        $die1 = new BMDie;
        $die2 = new BMDie;
        $this->object->dieArrayArray = array(array($die1), array($die2));
        $this->assertEquals($die1, $this->object->dieArrayArray[0][0]);
        $this->assertEquals($die2, $this->object->dieArrayArray[1][0]);

        $this->object->gameScoreArray = array(array(2,1,1), array(1,2,1));

        try {
            $this->object->gameScoreArray = array(array(2,1,1), array(1,2));
            $this->fail('W/L/D must be three numbers.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->gameScoreArray = array(array(2,1,1));
            $this->fail('There must be the same number of players and game scores.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_active_die_array_array() {
        $die1 = new BMDie;
        $die2 = new BMDie;

        // valid set
        $this->object->activeDieArrayArray = array(array(), array());
        $this->object->activeDieArrayArray = array(array($die1), array($die2));

        // invalid set
        try {
            $this->object->activeDieArrayArray = 'abc';
            $this->fail('Active die array array must be an array.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->activeDieArrayArray = array(1, 2);
            $this->fail('Active die arrays must be arrays.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->activeDieArrayArray = array(array(1), array(2));
            $this->fail('Active die arrays must be arrays of BM dice.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_attack() {
        try {
            $this->object->attack = array(array(1), array(2));
            $this->fail('There must be exactly three elements in attack.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->attack = array(1, array(2), '');
            $this->fail('The first element of attack must be an array.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->attack = array(array(1), 2, '');
            $this->fail('The second element of attack must be an array.');
        }
        catch (InvalidArgumentException $expected) {
        }

        // james: add test about third element of attack

        // check that a pass attack is valid
        $this->object->attack = array(array(), array(), '');

        // check that a skill attack is valid
        $this->object->attack = array(array(0, 5), array(2), 'skill');
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_pass_status_array() {
        // valid set
        $this->object->passStatusArray = array(TRUE, FALSE);

        // invalid set
        try {
            $this->object->passStatusArray = TRUE;
            $this->fail('Pass status array must be an array.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->passStatusArray = array(TRUE, TRUE, TRUE);
            $this->fail('Pass status array must have the same number of elements '.
                        'as the number of players.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->passStatusArray = array(1, 2);
            $this->fail('Pass statuses must be booleans.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_captured_die_array_array() {
        $die1 = new BMDie;
        $die2 = new BMDie;

        // valid set
        $this->object->capturedDieArrayArray = array(array(), array());
        $this->object->capturedDieArrayArray = array(array($die1), array($die2));

        // invalid set
        try {
            $this->object->capturedDieArrayArray = 'abc';
            $this->fail('Active die array array must be an array.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->capturedDieArrayArray = array(1, 2);
            $this->fail('Active die arrays must be arrays.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->capturedDieArrayArray = array(array(1), array(2));
            $this->fail('Active die arrays must be arrays of BM dice.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_round_score_array() {
        // valid set
        $this->object->roundScoreArray = array(22, 35);

        // invalid set
        try {
            $this->object->roundScoreArray = 42;
            $this->fail('The round score must have one score for each player.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->roundScoreArray = array(22, 35, 59);
            $this->fail('The round score must have one score for each player.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->roundScoreArray = array(22);
            $this->fail('The round score must have one score for each player.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_max_wins() {
        // valid set
        $this->object->maxWins = 5;

        // invalid set
        try {
            $this->object->maxWins = 0;
            $this->fail('maxWins must be a positive integer.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->maxWins = 2.5;
            $this->fail('maxWins must be a positive integer.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__set
     */
    public function test__set_game_state() {
        // valid set
        $this->object->gameState = BMGameState::startRound;

        // invalid set
        try {
            $this->object->gameState = 'abcd';
            $this->fail('Game state must be an integer.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            $this->object->gameState = 0;
            $this->fail('Invalid game state.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

    /**
     * @covers BMGame::__isset
     */
    public function test__isset() {
        $button1 = new BMButton;
        $button2 = new BMButton;
        $this->object->buttonArray = array($button1, $button2);
        $this->assertTrue(isset($this->object->buttonArray));
    }

    /**
     * @covers BMGame::__unset
     */
    public function test__unset() {
        // check that a nonexistent property can be unset gracefully
        unset($this->object->rubbishVariable);

        $button1 = new BMButton;
        $button2 = new BMButton;
        $this->object->buttonArray = array($button1, $button2);
        unset($this->object->buttonArray);
        $this->assertFalse(isset($this->object->buttonArray));
    }

    /**
     */
    public function testBMGameStateOrder() {
        $this->assertTrue(BMGameState::startGame <
                          BMGameState::applyHandicaps);
        $this->assertTrue(BMGameState::applyHandicaps <
                          BMGameState::chooseAuxiliaryDice);
        $this->assertTrue(BMGameState::chooseAuxiliaryDice <
                          BMGameState::loadDiceIntoButtons);
        $this->assertTrue(BMGameState::loadDiceIntoButtons <
                          BMGameState::specifyDice);
        $this->assertTrue(BMGameState::specifyDice <
                          BMGameState::addAvailableDiceToGame);
        $this->assertTrue(BMGameState::addAvailableDiceToGame <
                          BMGameState::determineInitiative);
        $this->assertTrue(BMGameState::determineInitiative <
                          BMGameState::startRound);
        $this->assertTrue(BMGameState::startRound <
                          BMGameState::startTurn);
        $this->assertTrue(BMGameState::startTurn <
                          BMGameState::endTurn);
        $this->assertTrue(BMGameState::endTurn <
                          BMGameState::endRound);
        $this->assertTrue(BMGameState::endRound <
                          BMGameState::endGame);
    }

    /**
     * @covers BMGameState::validate_game_state
     */
    public function test_validate_game_state() {
        // valid set
        BMGameState::validate_game_state(BMGameState::startRound);

        // invalid set
        try {
            BMGameState::validate_game_state('abcd');
            $this->fail('Game state must be an integer.');
        }
        catch (InvalidArgumentException $expected) {
        }

        try {
            BMGameState::validate_game_state(0);
            $this->fail('Invalid game state.');
        }
        catch (InvalidArgumentException $expected) {
        }
    }

}
