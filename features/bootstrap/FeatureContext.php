<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\SnippetAcceptingContext;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends Behat\MinkExtension\Context\MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @When I scroll the page
     */
    public function iScrollThePage()
    {
        throw new PendingException();
    }

    /**
     * @Then I should see an error about the missing autoloader
     */
    public function iShouldSeeAnErrorAboutTheMissingAutoloader()
    {
        throw new PendingException();
    }


    /**
     * @When I have visited Main page
     */
    public function iHaveVisitedMainPage()
    {
        $session = $this->getMink()->getSession();
        $session->visit('http://coworking.local/design/');
    }

    /**
     * @When Page loaded
     */
    public function pageLoaded()
    {
        $this->getMink()->getSession()->wait(1000);
    }

    /**
     * @When I click on :arg1
     */
    public function iClickOn($arg1)
    {
        $this->clickLink($arg1);
    }

    /**
     * @Then I should see :arg1 after :arg2 miliseconds
     */
    public function iShouldSeeAfterMiliseconds($text, $time)
    {
        $this->getMink()->getSession()->wait($time);
        $this->assertPageContainsText($text);
    }


}
