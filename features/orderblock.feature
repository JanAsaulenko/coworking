Feature:
  Test order block

  @mink:selenium2
  Scenario:
    Check "Order" button
    Given I am on the homepage
    When Page loaded
    Then I should see "Замовити зараз" in the "button" element

  @mink:selenium2
  Scenario:
    Check "More" button
    Given I am on homepage
    When Page loaded
    Then I should see "Додатково" in the "button" element

