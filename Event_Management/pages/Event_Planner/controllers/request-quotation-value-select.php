<?php

/*********** general ***********/
switch ($event_type) {
    case 'Anniversary':
        $isAnniversary = 'selected';
        break;
    case 'Birthday':
        $isBirthday = 'selected';
        break;
    case 'Company Party':
        $isCompanyParty = 'selected';
        break;
    case 'Corporate Event':
        $isCorporateEvent = 'selected';
        break;
    case 'Conference':
        $isConference = 'selected';
        break;
    case 'Exhibition':
        $isExhibition = 'selected';
        break;
    case 'Gender Reveal':
        $isGenderReveal = 'selected';
        break;
    case 'Musical Show':
        $isMusicalShow = 'selected';
        break;
    case 'Seminar':
        $isSeminar = 'selected';
        break;
    case 'Sports and Competition':
        $isSportsAndCompetition = 'selected';
        break;
    case 'Wedding':
        $isWedding = 'selected';
        break;
    case 'Other':
        $isOther = 'selected';
        break;
    default:
        $isDefault = 'selected';
        break;
}

/*********** food and beverages ***********/
if ($psType == "foodbev") {
    if ($result_food->num_rows > 0) {
        // $food_row = $result_food->fetch_assoc();
        // $food_available_in = $food_row['available_in'];
        // $food_available_at = $food_row['available_at'];

        // need as
        switch ($food_available_in) {
            case 'Buffet':
                $isBuffet = 'checked';
                break;
            case 'Packets':
                $isPackets = 'checked';
                break;
            case 'Packets/Cups':
                $isCups = 'checked';
                break;
            case 'Bottle':
                $isBottle = 'checked';
                break;
            case 'Bulk':
                $isBulk = 'checked';
                break;
            case 'Other':
                $isOther = 'checked';
                break;
        }

        // need for
        switch ($food_available_at) {
            case 'Breakfast':
                $isBreakfast = 'checked';
                break;
            case 'Lunch':
                $isLunch = 'checked';
                break;
            case 'Dinner':
                $isDinner = 'checked';
                break;
            case 'Brunch':
                $isBrunch = 'checked';
                break;
            case 'High-Tea':
                $isHighTea = 'checked';
                break;
        }
    }
}
