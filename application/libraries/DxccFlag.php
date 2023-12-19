<?php

class DxccFlag
{

    private $dxccFlags = array(
       '1' => "\u{1F1E8}\u{1F1E6}",  //CANADA
       '2' => "", //ABU AIL IS
       '3' => "\u{1F1E6}\u{1F1EB}",  //AFGHANISTAN
       '4' => "", //AGALEGA & ST BRANDON ISLANDS
       '5' => "\u{1F1E6}\u{1F1FD}",  //ALAND ISLANDS
       '6' => "", //ALASKA
       '7' => "\u{1F1E6}\u{1F1F1}",  //ALBANIA
       '8' => "", //ALDABRA
       '9' => "\u{1F1E6}\u{1F1F8}",  //AMERICAN SAMOA
       '10' => "", //AMSTERDAM & ST PAUL ISLANDS
       '11' => "", //ANDAMAN & NICOBAR ISLANDS
       '12' => "\u{1F1E6}\u{1F1EE}",  //ANGUILLA
       '13' => "\u{1F1E6}\u{1F1F6}",  //ANTARCTICA
       '14' => "\u{1F1E6}\u{1F1F2}",  //ARMENIA
       '15' => "\u{1F1F7}\u{1F1FA}",  //ASIATIC RUSSIA
       '16' => "", //NEW ZEALAND SUBANTARCTIC ISLANDS
       '17' => "", //AVES ISLAND
       '18' => "\u{1F1E6}\u{1F1FF}",  //AZERBAIJAN
       '19' => "", //BAJO NUEVO
       '20' => "", //BAKER HOWLAND ISLANDS
       '21' => "", //BALEARIC ISLANDS
       '22' => "\u{1F1F5}\u{1F1FC}",  //PALAU
       '23' => "", //BLENHEIM REEF
       '24' => "\u{1F1E7}\u{1F1FB}",  //BOUVET ISLAND
       '25' => "", //BRITISH NORTH BORNEO
       '26' => "", //BRITISH SOMALILAND
       '27' => "\u{1F1E7}\u{1F1FE}",  //BELARUS
       '28' => "", //CANAL ZONE
       '29' => "", //CANARY ISLANDS
       '30' => "", //CELEBE & MOLUCCA ISLANDS
       '31' => "\u{1F1F0}\u{1F1EA}",  //CENTRAL KIRIBATI
       '32' => "", //CEUTA & MELILLA
       '33' => "", //CHAGOS ISLANDS
       '34' => "", //CHATHAM ISLAND
       '35' => "\u{1F1E8}\u{1F1FD}",  //CHRISTMAS ISLAND
       '36' => "", //CLIPPERTON ISLAND
       '37' => "", //COCOS ISLAND
       '38' => "\u{1F1E8}\u{1F1E8}",  //COCOS (KEELING) ISLAND
       '39' => "", //COMORO ISLANDS
       '40' => "", //CRETE
       '41' => "", //CROZET ISLAND
       '42' => "", //"DAMAO, DIU"
       '43' => "", //DESECHEO ISLAND
       '44' => "", //DESROCHES
       '45' => "", //DODECANESE
       '46' => "", //EAST MALAYSIA
       '47' => "", //EASTER ISLAND
       '48' => "\u{1F1F0}\u{1F1EA}",  //EASTERN KIRIBATI
       '49' => "\u{1F1EC}\u{1F1F6}",  //EQUATORIAL GUINEA
       '50' => "\u{1F1F2}\u{1F1FD}",  //MEXICO
       '51' => "\u{1F1EA}\u{1F1F7}",  //ERITREA
       '52' => "\u{1F1EA}\u{1F1EA}",  //ESTONIA
       '53' => "", //ETHIOPIA
       '54' => "\u{1F1F7}\u{1F1FA}",  //EUROPEAN RUSSIA
       '55' => "", //FARQUHAR
       '56' => "", //FERNANDO DE NORONHA
       '57' => "", //FRENCH EQUATORIAL AFRICA
       '58' => "", //FRENCH INDO-CHINA
       '59' => "\u{1F1F5}\u{1F1EB}",  //FRENCH WEST AFRICA
       '60' => "\u{1F1E7}\u{1F1F8}",  //BAHAMAS
       '61' => "", //FRANZ JOSEF LAND
       '62' => "\u{1F1E7}\u{1F1E7}",  //BARBADOS
       '63' => "\u{1F1EB}\u{1F1F7}",  //FRENCH GUIANA
       '64' => "\u{1F1E7}\u{1F1F2}",  //BERMUDA
       '65' => "\u{1F1FB}\u{1F1EC}",  //BRITISH VIRGIN ISLANDS
       '66' => "\u{1F1E7}\u{1F1FF}",  //BELIZE
       '67' => "", //FRENCH INDIA
       '68' => "", //KUWAIT/SAUDI ARABIA NEUT. ZONE
       '69' => "\u{1F1F0}\u{1F1FE}",  //CAYMAN ISLANDS
       '70' => "\u{1F1E8}\u{1F1FA}",  //CUBA
       '71' => "", //GALAPAGOS ISLANDS
       '72' => "\u{1F1E9}\u{1F1F4}",  //DOMINICAN REPUBLIC
       '74' => "\u{1F1F8}\u{1F1FB}",  //EL SALVADOR
       '75' => "\u{1F1EC}\u{1F1F2}",  //GEORGIA
       '76' => "\u{1F1EC}\u{1F1FA}",  //GUATEMALA
       '77' => "\u{1F1EC}\u{1F1F1}",  //GRENADA
       '78' => "\u{1F1EC}\u{1F1FE}",  //HAITI
       '79' => "\u{1F1EC}\u{1F1E9}",  //GUADELOUPE
       '80' => "\u{1F1ED}\u{1F1F2}",  //HONDURAS
       '81' => "\u{1F1EC}\u{1F1EA}",  //GERMANY
       '82' => "\u{1F1EE}\u{1F1F9}",  //JAMAICA
       '84' => "\u{1F1F2}\u{1F1F6}",  //MARTINIQUE
       '85' => "\u{1F1E7}\u{1F1F6}",  //"BONAIRE, CURACAO (NETH ANTILLES)"
       '86' => "\u{1F1F3}\u{1F1EE}",  //NICARAGUA
       '88' => "\u{1F1F5}\u{1F1E6}",  //PANAMA
       '89' => "\u{1F1F9}\u{1F1E8}",  //TURKS & CAICOS ISLANDS
       '90' => "\u{1F1F9}\u{1F1F9}",  //TRINIDAD & TOBAGO
       '91' => "\u{1F1E6}\u{1F1FC}",  //ARUBA
       '93' => "", //GEYSER REEF
       '94' => "\u{1F1E6}\u{1F1EC}",  //ANTIGUA & BARBUDA
       '95' => "\u{1F1E9}\u{1F1F2}",  //DOMINICA
       '96' => "\u{1F1F2}\u{1F1F8}",  //MONTSERRAT
       '97' => "\u{1F1F1}\u{1F1E8}",  //SAINT LUCIA
       '98' => "\u{1F1FB}\u{1F1E8}",  //SAINT VINCENT
       '99' => "", //GLORIOSO ISLAND
       '100' => "\u{1F1E6}\u{1F1F7}",  //ARGENTINA
       '101' => "", //GOA
       '102' => "", //GOLD COAST TOGOLAND
       '103' => "\u{1F1EC}\u{1F1F5}",  //GUAM
       '104' => "\u{1F1E7}\u{1F1F4}",  //BOLIVIA
       '105' => "", //GUANTANAMO BAY
       '106' => "\u{1F1EC}\u{1F1F9}",  //GUERNSEY
       '107' => "\u{1F1EC}\u{1F1EC}",  //GUINEA
       '108' => "\u{1F1E7}\u{1F1F7}",  //BRAZIL
       '109' => "\u{1F1EC}\u{1F1F3}",  //GUINEA-BISSAU
       '110' => "", //HAWAII
       '111' => "\u{1F1ED}\u{1F1F9}",  //HEARD ISLAND
       '112' => "\u{1F1E8}\u{1F1F1}",  //CHILE
       '113' => "", //IFNI
       '114' => "\u{1F1EE}\u{1F1EA}",  //ISLE OF MAN
       '115' => "", //ITALIAN SOMALI
       '116' => "\u{1F1E8}\u{1F1F4}",  //COLOMBIA
       '117' => "", //ITU HQ
       '118' => "", //JAN MAYEN
       '119' => "", //JAVA
       '120' => "\u{1F1EA}\u{1F1E8}",  //ECUADOR
       '122' => "\u{1F1EF}\u{1F1F5}",  //JERSEY
       '123' => "", //JOHNSTON ISLAND
       '124' => "", //"JUAN DE NOVA, EUROPA"
       '125' => "", //JUAN FERNANDEZ ISLANDS
       '126' => "", //KALININGRAD
       '127' => "", //KAMARAN ISLANDS
       '128' => "", //KARELO-FINN REP
       '129' => "\u{1F1EC}\u{1F1FC}",  //GUYANA
       '130' => "\u{1F1EF}\u{1F1F4}",  //KAZAKHSTAN
       '131' => "", //KERGUELEN ISLAND
       '132' => "\u{1F1F5}\u{1F1FE}",  //PARAGUAY
       '133' => "", //KERMADEC ISLAND
       '134' => "", //KINGMAN REEF
       '135' => "\u{1F1F0}\u{1F1EC}",  //KYRGYZSTAN
       '136' => "\u{1F1F5}\u{1F1EA}",  //PERU
       '137' => "\u{1F1F0}\u{1F1F5}",  //REPUBLIC OF KOREA
       '138' => "", //KURE ISLAND
       '139' => "\u{1F1FD}\u{1F1F0}",  //KURIA MURIA ISLAND
       '140' => "\u{1F1F8}\u{1F1F7}",  //SURINAME
       '141' => "\u{1F1EA}\u{1F1F9}",  //FALKLAND ISLANDS
       '142' => "", //LAKSHADWEEP ISLANDS
       '143' => "\u{1F1F1}\u{1F1E6}",  //LAOS
       '144' => "\u{1F1FA}\u{1F1FE}",  //URUGUAY
       '145' => "\u{1F1F1}\u{1F1FB}",  //LATVIA
       '146' => "\u{1F1F1}\u{1F1F9}",  //LITHUANIA
       '147' => "", //LORD HOWE ISLAND
       '148' => "\u{1F1FB}\u{1F1EA}",  //VENEZUELA
       '149' => "", //AZORES
       '150' => "\u{1F1E6}\u{1F1FA}",  //AUSTRALIA
       '151' => "", //MALYJ VYSOTSKIJ ISLAND
       '152' => "\u{1F1F2}\u{1F1F4}",  //MACAO
       '153' => "", //MACQUARIE ISLAND
       '154' => "", //YEMEN ARAB REPUBLIC
       '155' => "\u{1F1F2}\u{1F1FE}",  //MALAYA
       '157' => "\u{1F1F3}\u{1F1F7}",  //NAURU
       '158' => "\u{1F1FB}\u{1F1FA}",  //VANUATU
       '159' => "\u{1F1F2}\u{1F1FB}",  //MALDIVES
       '160' => "\u{1F1F9}\u{1F1F4}",  //TONGA
       '161' => "", //MALPELO ISLAND
       '162' => "\u{1F1F3}\u{1F1E8}",  //NEW CALEDONIA
       '163' => "\u{1F1F5}\u{1F1EC}",  //PAPUA NEW GUINEA
       '164' => "", //MANCHURIA
       '165' => "\u{1F1F2}\u{1F1FA}",  //MAURITIUS ISLAND
       '166' => "", //MARIANA ISLANDS
       '167' => "", //MARKET REEF
       '168' => "\u{1F1F2}\u{1F1ED}",  //MARSHALL ISLANDS
       '169' => "\u{1F1FE}\u{1F1F9}",  //MAYOTTE
       '170' => "\u{1F1F3}\u{1F1FF}",  //NEW ZEALAND
       '171' => "", //MELLISH REEF
       '172' => "\u{1F1F5}\u{1F1F3}",  //PITCAIRN ISLAND
       '173' => "\u{1F1EB}\u{1F1F2}",  //MICRONESIA
       '174' => "", //MIDWAY ISLAND
       '175' => "\u{1F1EC}\u{1F1EB}",  //FRENCH POLYNESIA
       '176' => "\u{1F1EB}\u{1F1F4}",  //FIJI ISLANDS
       '177' => "", //MINAMI TORISHIMA
       '178' => "", //MINERVA REEF
       '179' => "\u{1F1F2}\u{1F1E9}",  //MOLDOVA
       '180' => "", //MOUNT ATHOS
       '181' => "\u{1F1F2}\u{1F1FF}",  //MOZAMBIQUE
       '182' => "", //NAVASSA ISLAND
       '183' => "", //NETHERLANDS BORNEO
       '184' => "", //NETHERLANDS NEW GUINEA
       '185' => "\u{1F1F8}\u{1F1E7}",  //SOLOMON ISLANDS
       '186' => "", //NEWFOUNDLAND LABRADOR
       '187' => "\u{1F1F3}\u{1F1EA}",  //NIGER
       '188' => "\u{1F1F3}\u{1F1FA}",  //NIUE
       '189' => "\u{1F1F3}\u{1F1EB}",  //NORFOLK ISLAND
       '190' => "\u{1F1FC}\u{1F1F8}",  //SAMOA
       '191' => "\u{1F1E8}\u{1F1F0}",  //NORTH COOK ISLANDS
       '192' => "", //OGASAWARA
       '193' => "", //OKINAWA
       '194' => "", //OKINO TORI-SHIMA
       '195' => "", //ANNOBON
       '196' => "", //PALESTINE (DELETED)
       '197' => "", //PALMYRA & JARVIS ISLANDS
       '198' => "", //PAPUA TERR
       '199' => "", //PETER 1 ISLAND
       '200' => "", //PORTUGUESE TIMOR
       '201' => "", //PRINCE EDWARD & MARION ISLANDS
       '202' => "\u{1F1F5}\u{1F1F7}",  //PUERTO RICO
       '203' => "\u{1F1E6}\u{1F1E9}",  //ANDORRA
       '204' => "", //REVILLAGIGEDO
       '205' => "", //ASCENSION ISLAND
       '206' => "\u{1F1E6}\u{1F1F9}",  //AUSTRIA
       '207' => "", //RODRIGUEZ ISLAND
       '208' => "", //RUANDA-URUNDI
       '209' => "\u{1F1E7}\u{1F1EA}",  //BELGIUM
       '210' => "", //SAAR
       '211' => "", //SABLE ISLAND
       '212' => "\u{1F1E7}\u{1F1EC}",  //BULGARIA
       '213' => "\u{1F1F2}\u{1F1EB}",  //SAINT MARTIN
       '214' => "", //CORSICA
       '215' => "\u{1F1E8}\u{1F1FE}",  //CYPRUS
       '216' => "", //SAN ANDRES ISLAND
       '217' => "", //SAN FELIX ISLANDS
       '218' => "", //CZECHOSLOVAKIA
       '219' => "\u{1F1F8}\u{1F1F9}",  //SAO TOME & PRINCIPE
       '220' => "", //SARAWAK
       '221' => "\u{1F1E9}\u{1F1F0}",  //DENMARK
       '222' => "\u{1F1EB}\u{1F1F0}",  //FAROE ISLANDS
       '223' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0065}\u{E006E}\u{E0067}\u{E007F}", //ENGLAND
       '224' => "\u{1F1EB}\u{1F1EF}",  //FINLAND
       '225' => "", //SARDINIA
       '226' => "", //SAUDI ARABIA/IRAQ NEUT ZONE
       '227' => "\u{1F1EB}\u{1F1EE}",  //FRANCE
       '228' => "", //SERRANA BANK & RONCADOR CAY
       '229' => "\u{1F1EC}\u{1F1EA}",  //GERMAN DEMOCRATIC REPUBLIC
       '230' => "\u{1F1EC}\u{1F1EA}",  //FEDERAL REPUBLIC OF GERMANY
       '231' => "", //SIKKIM
       '232' => "\u{1F1F8}\u{1F1F4}",  //SOMALIA
       '233' => "\u{1F1EC}\u{1F1ED}",  //GIBRALTAR
       '234' => "\u{1F1E8}\u{1F1F0}",  //SOUTH COOK ISLANDS
       '235' => "\u{1F1EC}\u{1F1F8}",  //SOUTH GEORGIA ISLAND
       '236' => "\u{1F1EC}\u{1F1EE}",  //GREECE
       '237' => "\u{1F1EC}\u{1F1F7}",  //GREENLAND
       '238' => "", //SOUTH ORKNEY ISLANDS
       '239' => "\u{1F1ED}\u{1F1F0}",  //HUNGARY
       '240' => "", //SOUTH SANDWICH ISLANDS
       '241' => "", //SOUTH SHETLAND ISLANDS
       '242' => "\u{1F1ED}\u{1F1FA}",  //ICELAND
       '243' => "", //PEOPLE'S DEM REP OF YEMEN
       '244' => "\u{1F1F8}\u{1F1F8}",  //SOUTHERN SUDAN
       '245' => "\u{1F1EE}\u{1F1F6}",  //IRELAND
       '246' => "", //SOV MILITARY ORDER OF MALTA
       '247' => "", //SPRATLY ISLANDS
       '248' => "\u{1F1EE}\u{1F1F1}",  //ITALY
       '249' => "\u{1F1F0}\u{1F1F3}",  //SAINT KITTS & NEVIS
       '250' => "\u{1F1F8}\u{1F1ED}",  //SAINT HELENA
       '251' => "\u{1F1F1}\u{1F1EE}",  //LIECHTENSTEIN
       '252' => "", //SAINT PAUL ISLAND
       '253' => "", //SAINT PETER AND PAUL ROCKS
       '254' => "\u{1F1F1}\u{1F1FA}",  //LUXEMBOURG
       '255' => "", //"SINT MAARTEN, SABA, ST EUSTATIUS"
       '256' => "", //MADEIRA ISLANDS
       '257' => "\u{1F1F2}\u{1F1F9}",  //MALTA
       '258' => "", //SUMATRA
       '259' => "\u{1F1F8}\u{1F1EF}",  //SVALBARD
       '260' => "\u{1F1F2}\u{1F1E8}",  //MONACO
       '261' => "", //SWAN ISLAND
       '262' => "\u{1F1F9}\u{1F1EF}",  //TAJIKISTAN
       '263' => "\u{1F1F3}\u{1F1F1}",  //NETHERLANDS
       '264' => "", //TANGIER
       '265' => "", //NORTHERN IRELAND
       '266' => "\u{1F1F3}\u{1F1F4}",  //NORWAY
       '267' => "", //TERR NEW GUINEA
       '268' => "", //TIBET
       '269' => "\u{1F1F5}\u{1F1F1}",  //POLAND
       '270' => "\u{1F1F9}\u{1F1F0}",  //TOKELAU ISLANDS
       '271' => "", //TRIESTE
       '272' => "\u{1F1F5}\u{1F1F9}",  //PORTUGAL
       '273' => "", //TRINDADE & MARTIM VAZ ISLANDS
       '274' => "", //TRISTAN DA CUNHA & GOUGH ISLANDS
       '275' => "\u{1F1F7}\u{1F1F4}",  //ROMANIA
       '276' => "", //TROMELIN ISLAND
       '277' => "\u{1F1F5}\u{1F1F2}",  //SAINT PIERRE & MIQUELON
       '278' => "\u{1F1F8}\u{1F1F2}",  //SAN MARINO
       '279' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0073}\u{E0063}\u{E0074}\u{E007F}", //SCOTLAND
       '280' => "\u{1F1F9}\u{1F1F2}",  //TURKMENISTAN
       '281' => "\u{1F1EA}\u{1F1F8}",  //SPAIN
       '282' => "\u{1F1F9}\u{1F1FB}",  //TUVALU
       '283' => "", //UK BASES ON CYPRUS
       '284' => "\u{1F1F8}\u{1F1EA}",  //SWEDEN
       '285' => "\u{1F1FB}\u{1F1EE}",  //US VIRGIN ISLANDS
       '286' => "\u{1F1FA}\u{1F1EC}",  //UGANDA
       '287' => "\u{1F1E8}\u{1F1ED}",  //SWITZERLAND
       '288' => "\u{1F1FA}\u{1F1E6}",  //UKRAINE
       '289' => "", //UNITED NATIONS HQ
       '291' => "\u{1F1FA}\u{1F1F8}",  //UNITED STATES OF AMERICA
       '292' => "\u{1F1FA}\u{1F1FF}",  //UZBEKISTAN
       '293' => "\u{1F1FB}\u{1F1F3}",  //VIET NAM
       '294' => "\u{1F3F4}\u{E0067}\u{E0062}\u{E0077}\u{E006C}\u{E0073}\u{E007F}", //WALES
       '295' => "\u{1F1FB}\u{1F1E6}",  //VATICAN CITY
       '296' => "\u{1F1F7}\u{1F1F8}",  //SERBIA
       '297' => "", //WAKE ISLAND
       '298' => "\u{1F1FC}\u{1F1EB}",  //WALLIS & FUTUNA ISLANDS
       '299' => "", //WEST MALAYSIA
       '301' => "", //WESTERN KIRIBATI
       '302' => "\u{1F1EA}\u{1F1ED}",  //WESTERN SAHARA
       '303' => "", //WILLIS ISLAND
       '304' => "\u{1F1E7}\u{1F1ED}",  //BAHRAIN
       '305' => "\u{1F1E7}\u{1F1E9}",  //BANGLADESH
       '306' => "\u{1F1E7}\u{1F1F9}",  //BHUTAN
       '307' => "", //ZANZIBAR
       '308' => "\u{1F1E8}\u{1F1F7}",  //COSTA RICA
       '309' => "\u{1F1F2}\u{1F1F2}",  //MYANMAR
       '312' => "\u{1F1F0}\u{1F1ED}",  //CAMBODIA
       '315' => "\u{1F1F1}\u{1F1F0}",  //SRI LANKA
       '318' => "\u{1F1E8}\u{1F1F3}",  //CHINA
       '321' => "\u{1F1ED}\u{1F1F3}",  //HONG KONG
       '324' => "\u{1F1EE}\u{1F1F8}",  //INDIA
       '327' => "\u{1F1EE}\u{1F1F3}",  //INDONESIA
       '330' => "\u{1F1EE}\u{1F1E9}",  //IRAN
       '333' => "\u{1F1EE}\u{1F1F7}",  //IRAQ
       '336' => "\u{1F1EE}\u{1F1F2}",  //ISRAEL
       '339' => "\u{1F1EF}\u{1F1F2}",  //JAPAN
       '342' => "\u{1F1EF}\u{1F1EA}",  //JORDAN
       '344' => "\u{1F1F0}\u{1F1EE}",  //DPRK (NORTH KOREA)
       '345' => "\u{1F1E7}\u{1F1F3}",  //BRUNEI
       '348' => "\u{1F1F0}\u{1F1FC}",  //KUWAIT
       '354' => "\u{1F1F1}\u{1F1E7}",  //LEBANON
       '363' => "\u{1F1F2}\u{1F1F3}",  //MONGOLIA
       '369' => "\u{1F1F3}\u{1F1F5}",  //NEPAL
       '370' => "\u{1F1F4}\u{1F1F2}",  //OMAN
       '372' => "\u{1F1F5}\u{1F1F0}",  //PAKISTAN
       '375' => "\u{1F1F5}\u{1F1ED}",  //PHILIPPINES
       '376' => "\u{1F1F6}\u{1F1E6}",  //QATAR
       '378' => "\u{1F1F8}\u{1F1E6}",  //SAUDI ARABIA
       '379' => "\u{1F1F8}\u{1F1E8}",  //SEYCHELLES ISLANDS
       '381' => "\u{1F1F8}\u{1F1EC}",  //SINGAPORE
       '382' => "\u{1F1E9}\u{1F1EF}",  //DJIBOUTI
       '384' => "\u{1F1F8}\u{1F1FE}",  //SYRIA
       '386' => "\u{1F1F9}\u{1F1FC}",  //TAIWAN
       '387' => "\u{1F1F9}\u{1F1ED}",  //THAILAND
       '390' => "\u{1F1F9}\u{1F1F7}",  //TURKEY
       '391' => "\u{1F1E6}\u{1F1EA}",  //UNITED ARAB EMIRATES
       '400' => "\u{1F1E9}\u{1F1FF}",  //ALGERIA
       '401' => "\u{1F1E6}\u{1F1F4}",  //ANGOLA
       '402' => "\u{1F1E7}\u{1F1FC}",  //BOTSWANA
       '404' => "\u{1F1E7}\u{1F1EE}",  //BURUNDI
       '406' => "\u{1F1E8}\u{1F1F2}",  //CAMEROON
       '408' => "\u{1F1E8}\u{1F1EB}",  //CENTRAL AFRICAN REPUBLIC
       '409' => "\u{1F1E8}\u{1F1FB}",  //CAPE VERDE
       '410' => "\u{1F1F9}\u{1F1E9}",  //CHAD
       '411' => "\u{1F1F0}\u{1F1F2}",  //COMOROS
       '412' => "\u{1F1E8}\u{1F1EC}",  //REPUBLIC OF THE CONGO
       '414' => "\u{1F1E8}\u{1F1E9}",  //DEM. REP. OF THE CONGO
       '416' => "\u{1F1E7}\u{1F1EF}",  //BENIN
       '420' => "\u{1F1F9}\u{1F1EB}",  //GABON
       '422' => "\u{1F1EC}\u{1F1E6}",  //THE GAMBIA
       '424' => "\u{1F1E9}\u{1F1EA}",  //GHANA
       '428' => "\u{1F1E8}\u{1F1EE}",  //COTE D'IVOIRE
       '430' => "\u{1F1F0}\u{1F1FF}",  //KENYA
       '432' => "\u{1F1F1}\u{1F1F8}",  //LESOTHO
       '434' => "\u{1F1F1}\u{1F1F7}",  //LIBERIA
       '436' => "\u{1F1F1}\u{1F1FE}",  //LIBYA
       '438' => "\u{1F1F2}\u{1F1EC}",  //MADAGASCAR
       '440' => "\u{1F1F2}\u{1F1FC}",  //MALAWI
       '442' => "\u{1F1F2}\u{1F1F1}",  //MALI
       '444' => "\u{1F1F2}\u{1F1F7}",  //MAURITANIA
       '446' => "\u{1F1F2}\u{1F1E6}",  //MOROCCO
       '450' => "\u{1F1F3}\u{1F1EC}",  //NIGERIA
       '452' => "\u{1F1FF}\u{1F1FC}", //ZIMBABWE
       '453' => "\u{1F1F7}\u{1F1EA}",  //REUNION ISLAND
       '454' => "\u{1F1F7}\u{1F1FC}",  //RWANDA
       '456' => "\u{1F1F8}\u{1F1F3}",  //SENEGAL
       '458' => "\u{1F1F8}\u{1F1F1}",  //SIERRA LEONE
       '460' => "", //ROTUMA
       '462' => "\u{1F1FF}\u{1F1E6}",  //REPUBLIC OF SOUTH AFRICA
       '464' => "\u{1F1F3}\u{1F1E6}",  //NAMIBIA
       '466' => "\u{1F1F8}\u{1F1E9}",  //SUDAN
       '468' => "\u{1F1F8}\u{1F1FF}",  //KINGDOM OF ESWATINI
       '470' => "\u{1F1F9}\u{1F1FF}",  //TANZANIA
       '474' => "\u{1F1F9}\u{1F1F3}",  //TUNISIA
       '478' => "\u{1F1EA}\u{1F1EC}",  //EGYPT
       '480' => "\u{1F1E7}\u{1F1EB}",  //BURKINA FASO
       '482' => "\u{1F1FF}\u{1F1F2}",  //ZAMBIA
       '483' => "\u{1F1F9}\u{1F1EC}",  //TOGO
       '488' => "", //WALVIS BAY
       '489' => "", //CONWAY REEF
       '490' => "", //BANABA ISLAND
       '492' => "\u{1F1FE}\u{1F1EA}",  //YEMEN
       '493' => "", //PENGUIN ISLANDS
       '497' => "\u{1F1ED}\u{1F1F7}",  //CROATIA
       '499' => "\u{1F1F8}\u{1F1EE}",  //SLOVENIA
       '501' => "\u{1F1E7}\u{1F1E6}",  //BOSNIA-HERZEGOVINA
       '502' => "\u{1F1F2}\u{1F1F0}",  //NORTH MACEDONIA
       '503' => "\u{1F1E8}\u{1F1FF}",  //CZECH REPUBLIC
       '504' => "\u{1F1F8}\u{1F1F0}",  //SLOVAK REPUBLIC
       '505' => "", //PRATAS ISLAND
       '506' => "", //SCARBOROUGH REEF
       '507' => "", //TEMOTU PROVINCE
       '508' => "", //AUSTRAL ISLANDS
       '509' => "", //MARQUESAS ISLANDS
       '510' => "\u{1F1F5}\u{1F1F8}",  //PALESTINE
       '511' => "\u{1F1F9}\u{1F1F1}",  //TIMOR-LESTE
       '512' => "", //CHESTERFIELD ISLANDS
       '513' => "", //DUCIE ISLAND
       '514' => "\u{1F1F2}\u{1F1EA}",  //MONTENEGRO
       '515' => "", //SWAINS ISLAND
       '516' => "\u{1F1E7}\u{1F1F1}",  //SAINT BARTHELEMY
       '517' => "\u{1F1E8}\u{1F1FC}",  //CURACAO
       '518' => "\u{1F1F8}\u{1F1FD}",  //SINT MAARTEN
       '519' => "", //SABA & ST EUSTATIUS
       '520' => "\u{1F1E7}\u{1F1F6}",  //BONAIRE
       '521' => "", //REPUBLIC OF SOUTH SUDAN
       '522' => "\u{1F1F0}\u{1F1F7}"  //REPUBLIC OF KOSOVO
    );

    public function get($dxcc)
    {
        return $this->dxccFlags[$dxcc];
    }

    /**
     * Set the country code aliases.
     *
     * @param  array  $aliases
     */
    public function setAliases(array $aliases)
    {
        $this->aliases = [];

        foreach ($aliases as $alias => $countryCode) {
            $this->aliases[strtoupper($alias)] = strtoupper($countryCode);
        }
    }

    /**
     * Convert the given character to unicode.
     *
     * @param  string  $char
     * @return string
     */
    private function toUnicode($char)
    {
        return mb_convert_encoding('&#'.self::toRegionalIndicator($char).';', 'UTF-8', 'HTML-ENTITIES');
    }

    /**
     * Convert the given characters to it's regional indicator codepoint.
     *
     * @param  string  $char
     * @return int
     */
    private function toRegionalIndicator($char)
    {
        return ord($char) + self::INDICATOR_OFFSET;
    }
}
