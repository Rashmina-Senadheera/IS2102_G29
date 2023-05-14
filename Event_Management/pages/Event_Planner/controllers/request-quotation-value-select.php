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

