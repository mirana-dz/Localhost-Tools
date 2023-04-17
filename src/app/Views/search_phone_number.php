<?php
include '../app/includes/header.php';

echo $pageDescription;
?>

    <script>
        const countryCodeIndicative = {
            'af': '93',
            'al': '355',
            'dz': '213',
            'as': '1684',
            'ad': '376',
            'ao': '244',
            'ai': '1264',
            'ag': '1268',
            'ar': '54',
            'am': '374',
            'aw': '297',
            'au': '61',
            'at': '43',
            'az': '994',
            'bs': '1242',
            'bh': '973',
            'bd': '880',
            'bb': '1246',
            'by': '375',
            'be': '32',
            'bz': '501',
            'bj': '229',
            'bm': '1441',
            'bt': '975',
            'bo': '591',
            'ba': '387',
            'bw': '267',
            'br': '55',
            'io': '246',
            'vg': '1284',
            'bn': '673',
            'bg': '359',
            'bf': '226',
            'mm': '95',
            'bi': '257',
            'kh': '855',
            'cm': '237',
            'ca': '1',
            'cv': '238',
            'ky': '1345',
            'cf': '236',
            'td': '235',
            'cl': '56',
            'cn': '86',
            'cx': '6189',
            'co': '57',
            'km': '269',
            'cg': '242',
            'cd': '243',
            'ck': '682',
            'cr': '506',
            'hr': '385',
            'cu': '53',
            'cy': '357',
            'cz': '420',
            'dk': '45',
            'dj': '253',
            'dm': '1767',
            'do': '1849',
            'do1': '1829',
            'do2': '1809',
            'tl': '670',
            'ec': '593',
            'eg': '20',
            'sv': '503',
            'gq': '240',
            'er': '291',
            'ee': '372',
            'et': '251',
            'fo': '298',
            'fj': '679',
            'fi': '358',
            'fr': '33',
            'gf': '594',
            'pf': '689',
            'ga': '241',
            'gm': '220',
            'ge': '995',
            'de': '49',
            'gh': '233',
            'gi': '350',
            'gr': '30',
            'gl': '299',
            'gd': '1473',
            'gp': '590',
            'gu': '1671',
            'gt': '502',
            'gn': '224',
            'gw': '245',
            'gy': '592',
            'ht': '509',
            'hn': '504',
            'hk': '852',
            'hu': '36',
            'is': '354',
            'in': '91',
            'id': '62',
            'ir': '98',
            'iq': '964',
            'ie': '353',
            'il': '972',
            'it': '39',
            'ci': '225',
            'jm': '1876',
            'jp': '81',
            'jo': '962',
            'kz': '7',
            'ke': '254',
            'ki': '686',
            'kw': '965',
            'kg': '996',
            'la': '856',
            'lv': '371',
            'lb': '961',
            'ls': '266',
            'lr': '231',
            'ly': '218',
            'li': '423',
            'lt': '370',
            'lu': '352',
            'mo': '853',
            'mk': '389',
            'mg': '261',
            'mw': '265',
            'my': '60',
            'mv': '960',
            'ml': '223',
            'mt': '356',
            'mh': '692',
            'mq': '596',
            'mr': '222',
            'mu': '230',
            'yt': '262',
            'mx': '52',
            'md': '373',
            'mc': '377',
            'mn': '976',
            'me': '382',
            'ms': '1664',
            'ma': '212',
            'mz': '258',
            'na': '264',
            'nr': '674',
            'np': '977',
            'nl': '31',
            'cw': '599',
            'nc': '687',
            'nz': '64',
            'ni': '505',
            'ne': '227',
            'ng': '234',
            'nu': '683',
            'nf': '672',
            'mp': '1670',
            'kp': '850',
            'no': '47',
            'om': '968',
            'pk': '92',
            'pw': '680',
            'ps': '970',
            'pa': '507',
            'pg': '675',
            'py': '595',
            'pe': '51',
            'ph': '63',
            'pn': '870',
            'pl': '48',
            'pt': '351',
            'pr': '1787',
            'qa': '974',
            're': '262',
            'ro': '40',
            'ru': '7',
            'rw': '250',
            'sh': '290',
            'kn': '1869',
            'lc': '1758',
            'mf': '1599',
            'pm': '508',
            'vc': '1784',
            'ws': '685',
            'sm': '378',
            'st': '239',
            'sa': '966',
            'sn': '221',
            'rs': '381',
            'sc': '248',
            'fk': '500',
            'sl': '232',
            'sg': '65',
            'sk': '421',
            'si': '386',
            'sb': '677',
            'so': '252',
            'za': '27',
            'kr': '82',
            'ss': '211',
            'es': '34',
            'lk': '94',
            'sd': '249',
            'sr': '597',
            'sz': '268',
            'se': '46',
            'ch': '41',
            'sy': '963',
            'tw': '886',
            'tj': '992',
            'tz': '255',
            'th': '66',
            'tg': '228',
            'tk': '690',
            'to': '676',
            'tt': '1868',
            'tn': '216',
            'tr': '90',
            'tm': '993',
            'tc': '1649',
            'tv': '688',
            'ug': '256',
            'gb': '44',
            'ua': '380',
            'ae': '971',
            'uy': '598',
            'us': '1',
            'uz': '998',
            'vu': '678',
            've': '58',
            'vn': '84',
            'vi': '1340',
            'wf': '681',
            'ye': '967',
            'zm': '260',
            'zw': '263'
        };

        function getCountryNumberCode(countryCode) {
            if (countryCodeIndicative.hasOwnProperty(countryCode)) {
                return countryCodeIndicative[countryCode];
            } else {
                return countryCode;
            }
        }

        $(document).on('keyup', '#phoneNumber', function () {
            $('#inputTrueCaller').val($(this).val());
            $('#inputSyncMe').val($(this).val());
            $('#inputWhoCalld').val($(this).val());
            $('#inputGoogle').val($(this).val());
            $('#inputBing').val($(this).val());
            $('#inputYandex').val($(this).val());
        });

        function doSearchTrueCaller() {
            const phoneNumberString = $('#inputTrueCaller').val(),
                selectIndicative = $('#selectIndicative').val();
            let trueCallerUrl = 'https://www.truecaller.com/search/' + selectIndicative + '/' + phoneNumberString;

            if (phoneNumberString.trim() !== '') {
                window.open(trueCallerUrl);
            } else {
                alert('Please enter a search query.');
            }
        }

        function doSearchSyncMe() {
            const phoneNumberString = $('#inputSyncMe').val(),
                selectIndicative = $('#selectIndicative').val();
            let IndicativeNumber = getCountryNumberCode(selectIndicative);
            let syncMeUrl = 'https://sync.me/search/?number=' + IndicativeNumber + phoneNumberString;

            if (phoneNumberString.trim() !== '') {
                window.open(syncMeUrl);
            } else {
                alert('Please enter a search query.');
            }

        }

        function doSearchWhoCalld() {
            const phoneNumberString = $('#inputWhoCalld').val(),
                selectIndicative = $('#selectIndicative').val();
            let IndicativeNumber = getCountryNumberCode(selectIndicative);
            let whoCalldUrl = 'https://whocalld.com/+' + IndicativeNumber + phoneNumberString;

            if (phoneNumberString.trim() !== '') {
                window.open(whoCalldUrl);
            } else {
                alert('Please enter a search query.');
            }
        }

        function formatPhoneNumber(n, phoneNumberString) {
            switch (n) {
                case 1:
                    // 066*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '0$2$3');
                case 2:
                    // 06-6*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{1})(\d{4})/, '0$2-$3');
                case 3:
                    // 21366*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '$1$2$3');
                case 4:
                    // +21366*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '%2B$1$2$3'); // %2B == +
                case 5:
                    // 0021366*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '00$1$2$3');
                case 6:
                    // + 213 (0) 66*******
                    return phoneNumberString.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{4})/, '%2B $1 (0) $2$3');
            }
        }

        function doSearchGoogle() {
            const phoneNumberString = $('#inputGoogle').val(),
                selectIndicative = $('#selectIndicative').val(),
                selectGoogleFormat = $('#selectGoogleFormat').val(),
                googleSearch = 'https://www.google.com/search?q=';
            let IndicativeNumber = getCountryNumberCode(selectIndicative),
                PhoneNumber = IndicativeNumber + phoneNumberString,
                PhoneNumberF1 = formatPhoneNumber(1, PhoneNumber),
                PhoneNumberF2 = formatPhoneNumber(2, PhoneNumber),
                PhoneNumberF3 = formatPhoneNumber(3, PhoneNumber),
                PhoneNumberF4 = formatPhoneNumber(4, PhoneNumber),
                PhoneNumberF5 = formatPhoneNumber(5, PhoneNumber),
                PhoneNumberF6 = formatPhoneNumber(6, PhoneNumber);

            switch (selectGoogleFormat) {
                case 'all':
                    // Allow Pop-ups for 127.0.0.1
                    window.open(googleSearch + '"' + PhoneNumberF1 + '"');
                    window.open(googleSearch + '"' + PhoneNumberF2 + '"');
                    window.open(googleSearch + '"' + PhoneNumberF3 + '"');
                    window.open(googleSearch + '"' + PhoneNumberF4 + '"');
                    window.open(googleSearch + '"' + PhoneNumberF5 + '"');
                    window.open(googleSearch + '"' + PhoneNumberF6 + '"');
                    break;
                case 'format1':
                    window.open(googleSearch + '"' + PhoneNumberF1 + '"');
                    break;
                case 'format2':
                    window.open(googleSearch + '"' + PhoneNumberF2 + '"');
                    break;
                case 'format3':
                    window.open(googleSearch + '"' + PhoneNumberF3 + '"');
                    break;
                case 'format4':
                    window.open(googleSearch + '"' + PhoneNumberF4 + '"');
                    break;
                case 'format5':
                    window.open(googleSearch + '"' + PhoneNumberF5 + '"');
                    break;
                case 'format6':
                    window.open(googleSearch + '"' + PhoneNumberF6 + '"');
                    break;
            }
        }

        function doSearchBing() {
            const phoneNumberString = $('#inputBing').val(),
                selectIndicative = $('#selectIndicative').val(),
                selectGoogleFormat = $('#selectBingFormat').val(),
                bingSearch = 'https://www.bing.com/search?q=';
            let IndicativeNumber = getCountryNumberCode(selectIndicative),
                PhoneNumber = IndicativeNumber + phoneNumberString,
                PhoneNumberF1 = formatPhoneNumber(1, PhoneNumber),
                PhoneNumberF2 = formatPhoneNumber(2, PhoneNumber),
                PhoneNumberF3 = formatPhoneNumber(3, PhoneNumber),
                PhoneNumberF4 = formatPhoneNumber(4, PhoneNumber),
                PhoneNumberF5 = formatPhoneNumber(5, PhoneNumber),
                PhoneNumberF6 = formatPhoneNumber(6, PhoneNumber);

            switch (selectGoogleFormat) {
                case 'all':
                    // Allow Pop-ups for 127.0.0.1
                    window.open(bingSearch + '"' + PhoneNumberF1 + '"');
                    window.open(bingSearch + '"' + PhoneNumberF2 + '"');
                    window.open(bingSearch + '"' + PhoneNumberF3 + '"');
                    window.open(bingSearch + '"' + PhoneNumberF4 + '"');
                    window.open(bingSearch + '"' + PhoneNumberF5 + '"');
                    window.open(bingSearch + '"' + PhoneNumberF6 + '"');
                    break;
                case 'format1':
                    window.open(bingSearch + '"' + PhoneNumberF1 + '"');
                    break;
                case 'format2':
                    window.open(bingSearch + '"' + PhoneNumberF2 + '"');
                    break;
                case 'format3':
                    window.open(bingSearch + '"' + PhoneNumberF3 + '"');
                    break;
                case 'format4':
                    window.open(bingSearch + '"' + PhoneNumberF4 + '"');
                    break;
                case 'format5':
                    window.open(bingSearch + '"' + PhoneNumberF5 + '"');
                    break;
                case 'format6':
                    window.open(bingSearch + '"' + PhoneNumberF6 + '"');
                    break;
            }
        }

        function doSearchYandex() {
            const phoneNumberString = $('#inputYandex').val(),
                selectIndicative = $('#selectIndicative').val(),
                selectGoogleFormat = $('#selectYandexFormat').val(),
                yandexSearch = 'https://yandex.ru/search/?lr=35&text=';
            let IndicativeNumber = getCountryNumberCode(selectIndicative),
                PhoneNumber = IndicativeNumber + phoneNumberString,
                PhoneNumberF1 = formatPhoneNumber(1, PhoneNumber),
                PhoneNumberF2 = formatPhoneNumber(2, PhoneNumber),
                PhoneNumberF3 = formatPhoneNumber(3, PhoneNumber),
                PhoneNumberF4 = formatPhoneNumber(4, PhoneNumber),
                PhoneNumberF5 = formatPhoneNumber(5, PhoneNumber),
                PhoneNumberF6 = formatPhoneNumber(6, PhoneNumber);

            switch (selectGoogleFormat) {
                case 'all':
                    // Allow Pop-ups for 127.0.0.1
                    window.open(yandexSearch + '"' + PhoneNumberF1 + '"');
                    window.open(yandexSearch + '"' + PhoneNumberF2 + '"');
                    window.open(yandexSearch + '"' + PhoneNumberF3 + '"');
                    window.open(yandexSearch + '"' + PhoneNumberF4 + '"');
                    window.open(yandexSearch + '"' + PhoneNumberF5 + '"');
                    window.open(yandexSearch + '"' + PhoneNumberF6 + '"');
                    break;
                case 'format1':
                    window.open(yandexSearch + '"' + PhoneNumberF1 + '"');
                    break;
                case 'format2':
                    window.open(yandexSearch + '"' + PhoneNumberF2 + '"');
                    break;
                case 'format3':
                    window.open(yandexSearch + '"' + PhoneNumberF3 + '"');
                    break;
                case 'format4':
                    window.open(yandexSearch + '"' + PhoneNumberF4 + '"');
                    break;
                case 'format5':
                    window.open(yandexSearch + '"' + PhoneNumberF5 + '"');
                    break;
                case 'format6':
                    window.open(yandexSearch + '"' + PhoneNumberF6 + '"');
                    break;
            }
        }
    </script>

    <label for="selectIndicative"></label>
    <select name="selectIndicative" id="selectIndicative" style="width: 25%;">
        <option value="af">Afghanistan (+93)</option>
        <option value="al">Albania (+355)</option>
        <option value="dz" selected>Algeria (+213)</option>
        <option value="as">American Samoa (+1684)</option>
        <option value="ad">Andorra (+376)</option>
        <option value="ao">Angola (+244)</option>
        <option value="ai">Anguilla (+1264)</option>
        <option value="ag">Antigua and Barbuda (+1268)</option>
        <option value="ar">Argentina (+54)</option>
        <option value="am">Armenia (+374)</option>
        <option value="aw">Aruba (+297)</option>
        <option value="au">Australia (+61)</option>
        <option value="at">Austria (+43)</option>
        <option value="az">Azerbaijan (+994)</option>
        <option value="bs">Bahamas (+1242)</option>
        <option value="bh">Bahrain (+973)</option>
        <option value="bd">Bangladesh (+880)</option>
        <option value="bb">Barbados (+1246)</option>
        <option value="by">Belarus (+375)</option>
        <option value="be">Belgium (+32)</option>
        <option value="bz">Belize (+501)</option>
        <option value="bj">Benin (+229)</option>
        <option value="bm">Bermuda (+1441)</option>
        <option value="bt">Bhutan (+975)</option>
        <option value="bo">Bolivia (+591)</option>
        <option value="ba">Bosnia and Herzegovina (+387)</option>
        <option value="bw">Botswana (+267)</option>
        <option value="br">Brazil (+55)</option>
        <option value="io">British Indian Ocean Territory (+246)</option>
        <option value="vg">British Virgin Islands (+1284)</option>
        <option value="bn">Brunei (+673)</option>
        <option value="bg">Bulgaria (+359)</option>
        <option value="bf">Burkina Faso (+226)</option>
        <option value="mm">Burma-Myanmar (+95)</option>
        <option value="bi">Burundi (+257)</option>
        <option value="kh">Cambodia (+855)</option>
        <option value="cm">Cameroon (+237)</option>
        <option value="ca">Canada (+1)</option>
        <option value="cv">Cape Verde (+238)</option>
        <option value="ky">Cayman Islands (+1345)</option>
        <option value="cf">Central African Republic (+236)</option>
        <option value="td">Chad (+235)</option>
        <option value="cl">Chile (+56)</option>
        <option value="cn">China (+86)</option>
        <option value="cx">Christmas Island (+6189)</option>
        <option value="co">Colombia (+57)</option>
        <option value="km">Comoros (+269)</option>
        <option value="cg">Congo (+242)</option>
        <option value="cd">Congo, The Democratic Republic (+243)</option>
        <option value="ck">Cook Islands (+682)</option>
        <option value="cr">Costa Rica (+506)</option>
        <option value="hr">Croatia (+385)</option>
        <option value="cu">Cuba (+53)</option>
        <option value="cy">Cyprus (+357)</option>
        <option value="cz">Czech Republic (+420)</option>
        <option value="dk">Denmark (+45)</option>
        <option value="dj">Djibouti (+253)</option>
        <option value="dm">Dominica (+1767)</option>
        <option value="do">Dominican Republic (+1849)</option>
        <option value="do">Dominican Republic (+1829)</option>
        <option value="do">Dominican Republic (+1809)</option>
        <option value="tl">East Timor (+670)</option>
        <option value="ec">Ecuador (+593)</option>
        <option value="eg">Egypt (+20)</option>
        <option value="sv">El Salvador (+503)</option>
        <option value="gq">Equatorial Guinea (+240)</option>
        <option value="er">Eritrea (+291)</option>
        <option value="ee">Estonia (+372)</option>
        <option value="et">Ethiopia (+251)</option>
        <option value="fo">Faroe Islands (+298)</option>
        <option value="fj">Fiji (+679)</option>
        <option value="fi">Finland (+358)</option>
        <option value="fr">France (+33)</option>
        <option value="gf">French Guiana (+594)</option>
        <option value="pf">French Polynesia (+689)</option>
        <option value="ga">Gabon (+241)</option>
        <option value="gm">Gambia (+220)</option>
        <option value="ge">Georgia (+995)</option>
        <option value="de">Germany (+49)</option>
        <option value="gh">Ghana (+233)</option>
        <option value="gi">Gibraltar (+350)</option>
        <option value="gr">Greece (+30)</option>
        <option value="gl">Greenland (+299)</option>
        <option value="gd">Grenada (+1473)</option>
        <option value="gp">Guadeloupe (+590)</option>
        <option value="gu">Guam (+1671)</option>
        <option value="gt">Guatemala (+502)</option>
        <option value="gn">Guinea (+224)</option>
        <option value="gw">Guinea-Bissau (+245)</option>
        <option value="gy">Guyana (+592)</option>
        <option value="ht">Haiti (+509)</option>
        <option value="hn">Honduras (+504)</option>
        <option value="hk">Hong Kong (+852)</option>
        <option value="hu">Hungary (+36)</option>
        <option value="is">Iceland (+354)</option>
        <option value="in">India (+91)</option>
        <option value="id">Indonesia (+62)</option>
        <option value="ir">Iran (+98)</option>
        <option value="iq">Iraq (+964)</option>
        <option value="ie">Ireland (+353)</option>
        <option value="il">Israel (+972)</option>
        <option value="it">Italy (+39)</option>
        <option value="ci">Ivory Coast (+225)</option>
        <option value="jm">Jamaica (+1876)</option>
        <option value="jp">Japan (+81)</option>
        <option value="jo">Jordan (+962)</option>
        <option value="kz">Kazakhstan (+7)</option>
        <option value="ke">Kenya (+254)</option>
        <option value="ki">Kiribati (+686)</option>
        <option value="kw">Kuwait (+965)</option>
        <option value="kg">Kyrgyzstan (+996)</option>
        <option value="la">Laos (+856)</option>
        <option value="lv">Latvia (+371)</option>
        <option value="lb">Lebanon (+961)</option>
        <option value="ls">Lesotho (+266)</option>
        <option value="lr">Liberia (+231)</option>
        <option value="ly">Libya (+218)</option>
        <option value="li">Liechtenstein (+423)</option>
        <option value="lt">Lithuania (+370)</option>
        <option value="lu">Luxembourg (+352)</option>
        <option value="mo">Macau (+853)</option>
        <option value="mk">Macedonia (+389)</option>
        <option value="mg">Madagascar (+261)</option>
        <option value="mw">Malawi (+265)</option>
        <option value="my">Malaysia (+60)</option>
        <option value="mv">Maldives (+960)</option>
        <option value="ml">Mali (+223)</option>
        <option value="mt">Malta (+356)</option>
        <option value="mh">Marshall Islands (+692)</option>
        <option value="mq">Martinique (+596)</option>
        <option value="mr">Mauritania (+222)</option>
        <option value="mu">Mauritius (+230)</option>
        <option value="yt">Mayotte (+262)</option>
        <option value="mx">Mexico (+52)</option>
        <option value="md">Moldova (+373)</option>
        <option value="mc">Monaco (+377)</option>
        <option value="mn">Mongolia (+976)</option>
        <option value="me">Montenegro (+382)</option>
        <option value="ms">Montserrat (+1664)</option>
        <option value="ma">Morocco (+212)</option>
        <option value="mz">Mozambique (+258)</option>
        <option value="na">Namibia (+264)</option>
        <option value="nr">Nauru (+674)</option>
        <option value="np">Nepal (+977)</option>
        <option value="nl">Netherlands (+31)</option>
        <option value="cw">Curaçao (+599)</option>
        <option value="nc">New Caledonia (+687)</option>
        <option value="nz">New Zealand (+64)</option>
        <option value="ni">Nicaragua (+505)</option>
        <option value="ne">Niger (+227)</option>
        <option value="ng">Nigeria (+234)</option>
        <option value="nu">Niue (+683)</option>
        <option value="nf">Norfolk Island (+672)</option>
        <option value="mp">Northern Mariana Islands (+1670)</option>
        <option value="kp">North Korea (+850)</option>
        <option value="no">Norway (+47)</option>
        <option value="om">Oman (+968)</option>
        <option value="pk">Pakistan (+92)</option>
        <option value="pw">Palau (+680)</option>
        <option value="ps">Palestine (+970)</option>
        <option value="pa">Panama (+507)</option>
        <option value="pg">Papua New Guinea (+675)</option>
        <option value="py">Paraguay (+595)</option>
        <option value="pe">Peru (+51)</option>
        <option value="ph">Philippines (+63)</option>
        <option value="pn">Pitcairn Islands (+870)</option>
        <option value="pl">Poland (+48)</option>
        <option value="pt">Portugal (+351)</option>
        <option value="pr">Puerto Rico (+1787)</option>
        <option value="qa">Qatar (+974)</option>
        <option value="re">Réunion (+262)</option>
        <option value="ro">Romania (+40)</option>
        <option value="ru">Russia (+7)</option>
        <option value="rw">Rwanda (+250)</option>
        <option value="sh">Saint Helena (+290)</option>
        <option value="kn">Saint Kitts and Nevis (+1869)</option>
        <option value="lc">Saint Lucia (+1758)</option>
        <option value="mf">Saint Martin (+1599)</option>
        <option value="pm">Saint Pierre and Miquelon (+508)</option>
        <option value="vc">Saint Vincent and the Grenadines (+1784)</option>
        <option value="ws">Samoa (+685)</option>
        <option value="sm">San Marino (+378)</option>
        <option value="st">São Tomé and Príncipe (+239)</option>
        <option value="sa">Saudi Arabia (+966)</option>
        <option value="sn">Senegal (+221)</option>
        <option value="rs">Serbia (+381)</option>
        <option value="sc">Seychelles (+248)</option>
        <option value="fk">Falkland Islands (+500)</option>
        <option value="sl">Sierra Leone (+232)</option>
        <option value="sg">Singapore (+65)</option>
        <option value="sk">Slovakia (+421)</option>
        <option value="si">Slovenia (+386)</option>
        <option value="sb">Solomon Islands (+677)</option>
        <option value="so">Somalia (+252)</option>
        <option value="za">South Africa (+27)</option>
        <option value="kr">South Korea (+82)</option>
        <option value="ss">South Sudan (+211)</option>
        <option value="es">Spain (+34)</option>
        <option value="lk">Sri Lanka (+94)</option>
        <option value="sd">Sudan (+249)</option>
        <option value="sr">Suriname (+597)</option>
        <option value="sz">Swaziland (+268)</option>
        <option value="se">Sweden (+46)</option>
        <option value="ch">Switzerland (+41)</option>
        <option value="sy">Syria (+963)</option>
        <option value="tw">Taiwan (+886)</option>
        <option value="tj">Tajikistan (+992)</option>
        <option value="tz">Tanzania (+255)</option>
        <option value="th">Thailand (+66)</option>
        <option value="tg">Togo (+228)</option>
        <option value="tk">Tokelau (+690)</option>
        <option value="to">Tonga (+676)</option>
        <option value="tt">Trinidad and Tobago (+1868)</option>
        <option value="tn">Tunisia (+216)</option>
        <option value="tr">Turkey (+90)</option>
        <option value="tm">Turkmenistan (+993)</option>
        <option value="tc">Turks and Caicos Islands (+1649)</option>
        <option value="tv">Tuvalu (+688)</option>
        <option value="ug">Uganda (+256)</option>
        <option value="gb">United Kingdom (+44)</option>
        <option value="ua">Ukraine (+380)</option>
        <option value="ae">United Arab Emirates (+971)</option>
        <option value="uy">Uruguay (+598)</option>
        <option value="us">United States (+1)</option>
        <option value="uz">Uzbekistan (+998)</option>
        <option value="vu">Vanuatu (+678)</option>
        <option value="ve">Venezuela (+58)</option>
        <option value="vn">Vietnam (+84)</option>
        <option value="vi">Virgin Islands (+1340)</option>
        <option value="wf">Wallis and Futuna (+681)</option>
        <option value="ye">Yemen (+967)</option>
        <option value="zm">Zambia (+260)</option>
        <option value="zw">Zimbabwe (+263)</option>
    </select>
    <label for="phoneNumber" class="inline"></label>
    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="660000000"
           style="width: 40%;" value="">
    <b>Fill in all fields below</b><br><br>
    <header class="separator marginT20 marginB20"></header>

    <!----- TrueCaller Reverse Number Lookup ----->
    <h3>TrueCaller Reverse Number Lookup</h3>
    <label for="inputTrueCaller"></label>
    <input type="text" name="inputTrueCaller" id="inputTrueCaller" style="width: 66%;"
           value="">
    <input type="button" name="btnSubmit" value="Search" id="searchTrueCaller" class="button"
           onclick="doSearchTrueCaller()">
    <header class="separator marginT20 marginB20"></header>

    <!----- sync.me Reverse Number Lookup ----->
    <h3>Sync.me Reverse Number Lookup</h3>
    <label for="inputSyncMe"></label>
    <input type="text" name="inputSyncMe" id="inputSyncMe" style="width: 66%;" value="">
    <input type="button" name="btnSubmit" value="Search" id="searchSyncMe" class="button"
           onclick="doSearchSyncMe()">
    <header class="separator marginT20 marginB20"></header>

    <!----- swhocalld.com Reverse Number Lookup ----->
    <h3>Whocalld.com Telephone number information</h3>
    <label for="inputWhoCalld"></label>
    <input type="text" name="inputWhoCalld" id="inputWhoCalld" style="width: 66%;" value="">
    <input type="button" name="btnSubmit" value="Search" id="searchWhoCalld" class="button"
           onclick="doSearchwWhoCalld()">
    <header class="separator marginT20 marginB20"></header>

    <!----- Google search ----->
    <h3>Google search</h3>
    <label for="inputGoogle"></label>
    <input type="text" name="inputGoogle" id="inputGoogle" style="width: 30%;" value="">
    <label for="selectGoogleFormat" class="inline"></label>
    <select name="selectGoogleFormat" id="selectGoogleFormat" style="width: 35%;">
        <option value="all">All formats</option>
        <option value="format1">Format : 066*******</option>
        <option value="format2">Format : 06-6*******</option>
        <option value="format3">Format : 21366*******</option>
        <option value="format4">Format : +21366*******</option>
        <option value="format5">Format : 0021366*******</option>
        <option value="format6">Format : + 213 (0) 66*******</option>
    </select>
    <input type="button" name="btnSubmit" value="Search" id="searchGoogle" class="button"
           onclick="doSearchGoogle()">
    <header class="separator marginT20 marginB20"></header>

    <!----- Bing search ----->
    <h3>Bing search</h3>
    <label for="inputBing"></label>
    <input type="text" name="inputBing" id="inputBing" style="width: 30%;" value="">
    <label for="selectBingFormat" class="inline"></label>
    <select name="selectBingFormat" id="selectBingFormat" style="width: 35%;">
        <option value="all">All formats</option>
        <option value="format1">Format : 066*******</option>
        <option value="format2">Format : 06-6*******</option>
        <option value="format3">Format : 21366*******</option>
        <option value="format4">Format : +21366*******</option>
        <option value="format5">Format : 0021366*******</option>
        <option value="format6">Format : + 213 (0) 66*******</option>
    </select>
    <input type="button" name="btnSubmit" value="Search" id="searchBing" class="button"
           onclick="doSearchBing()">
    <header class="separator marginT20 marginB20"></header>

    <!----- Yandex search ----->
    <h3>Yandex search</h3>
    <label for="inputYandex"></label>
    <input type="text" name="inputYandex" id="inputYandex" style="width: 30%;" value="">
    <label for="selectYandexFormat" class="inline"></label>
    <select name="selectYandexFormat" id="selectYandexFormat" style="width: 35%;">
        <option value="all">All formats</option>
        <option value="format1">Format : 066*******</option>
        <option value="format2">Format : 06-6*******</option>
        <option value="format3">Format : 21366*******</option>
        <option value="format4">Format : +21366*******</option>
        <option value="format5">Format : 0021366*******</option>
        <option value="format6">Format : + 213 (0) 66*******</option>
    </select>
    <input type="button" name="btnSubmit" value="Search" id="searchYandex" class="button"
           onclick="doSearchYandex()">
    <header class="separator marginT20 marginB20"></header>

    <!----- Emobiletracker ----->
    <h3>Emobiletracker</h3>
    <input type="button" name="btnSubmit" value="www.emobiletracker.com" id="searchEmobiletracker" class="button"
           onclick="window.open('https://www.emobiletracker.com/free-trace-world-phone.html')">

<?php
include '../app/includes/footer.php'; ?>