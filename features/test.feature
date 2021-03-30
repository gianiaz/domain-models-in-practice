Feature: A Customer reserves specific seats at a specific screening (for simplicity, assume there exists only one screening for the time beeing).

  Scenario: Seat is available
    Given a Screening with 10 seats
    When The Customer reserve a Seat
    Then The Seats available are 9

#  Scenario: seat is released after 12 minutes
#    Given a Screening with 10 seats
#    When The Customer reserve a Seat
#    Then The Seats available are 9
#    When 12 minutes passes
#    Then The Seats available are 10

