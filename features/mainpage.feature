Feature:
  In order to prove that Behat works as intended
  We want to test the home page for a phrase

  Scenario: Check copyright notice
    When I am on the homepage
    Then I should see " by ITA"


  @mink:selenium2
  Scenario: Test new design
    When I am on the homepage
    Then I should see "It's a free responsive site template by HTML5 UP"
  @mink:selenium2
  Scenario: Test if tariff's block is invisible
    When I am on the homepage
    Then I should not see "Put something here"
  @mink:selenium2
  Scenario:  Test
    Given I am on the homepage
    When I click on "Фото"
    Then I should see "More" after 1000 miliseconds
  

