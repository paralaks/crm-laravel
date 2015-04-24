<?php
namespace App;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
/*
 *
 *  Very handy helper class to generate option lists from lookup tables and return values by :
 *  - Caching lookup tables during request.
 *  - Returning single values quickly hence avoiding expensive model relationships for data display
 *
 */

class AppHelper
{
  static $optionList=array();
  static $countries=array('CA'=>'Canada', 'US'=>'USA', 'DZ'=>'Algeria', 'AD'=>'Andorra', 'AO'=>'Angola', 'AI'=>'Anguilla', 'AG'=>'Antigua &amp; Barbuda', 'AR'=>'Argentina', 'AM'=>'Armenia', 'AW'=>'Aruba', 'AU'=>'Australia', 'AT'=>'Austria', 'AZ'=>'Azerbaijan', 'BS'=>'Bahamas', 'BH'=>'Bahrain', 'BD'=>'Bangladesh', 'BB'=>'Barbados', 'BY'=>'Belarus', 'BE'=>'Belgium', 'BZ'=>'Belize', 'BJ'=>'Benin', 'BM'=>'Bermuda', 'BT'=>'Bhutan', 'BO'=>'Bolivia', 'BA'=>'Bosnia Herzegovina', 'BW'=>'Botswana', 'BR'=>'Brazil', 'BN'=>'Brunei', 'BG'=>'Bulgaria', 'BF'=>'Burkina Faso', 'BI'=>'Burundi', 'KH'=>'Cambodia', 'CM'=>'Cameroon', 'CV'=>'Cape Verde Islands', 'KY'=>'Cayman Islands', 'CF'=>'Central African Republic', 'CL'=>'Chile', 'CN'=>'China', 'CO'=>'Colombia', 'KM'=>'Comoros', 'CG'=>'Congo', 'CK'=>'Cook Islands', 'CR'=>'Costa Rica', 'HR'=>'Croatia', 'CU'=>'Cuba', 'CY'=>'Cyprus North', 'CY'=>'Cyprus South', 'CZ'=>'Czech Republic', 'DK'=>'Denmark', 'DJ'=>'Djibouti', 'DM'=>'Dominica', 'DO'=>'Dominican Republic', 'EC'=>'Ecuador', 'EG'=>'Egypt', 'SV'=>'El Salvador', 'GQ'=>'Equatorial Guinea', 'ER'=>'Eritrea', 'EE'=>'Estonia', 'ET'=>'Ethiopia', 'FK'=>'Falkland Islands', 'FO'=>'Faroe Islands', 'FJ'=>'Fiji', 'FI'=>'Finland', 'FR'=>'France', 'GF'=>'French Guiana', 'PF'=>'French Polynesia', 'GA'=>'Gabon', 'GM'=>'Gambia', 'GE'=>'Georgia', 'DE'=>'Germany', 'GH'=>'Ghana', 'GI'=>'Gibraltar', 'GR'=>'Greece', 'GL'=>'Greenland', 'GD'=>'Grenada', 'GP'=>'Guadeloupe', 'GU'=>'Guam', 'GT'=>'Guatemala', 'GN'=>'Guinea', 'GW'=>'Guinea - Bissau', 'GY'=>'Guyana', 'HT'=>'Haiti', 'HN'=>'Honduras', 'HK'=>'Hong Kong', 'HU'=>'Hungary', 'IS'=>'Iceland', 'IN'=>'India', 'ID'=>'Indonesia', 'IR'=>'Iran', 'IQ'=>'Iraq', 'IE'=>'Ireland', 'IL'=>'Israel', 'IT'=>'Italy', 'JM'=>'Jamaica', 'JP'=>'Japan', 'JO'=>'Jordan', 'KZ'=>'Kazakhstan', 'KE'=>'Kenya', 'KI'=>'Kiribati', 'KP'=>'Korea North', 'KR'=>'Korea South', 'KW'=>'Kuwait', 'KG'=>'Kyrgyzstan', 'LA'=>'Laos', 'LV'=>'Latvia', 'LB'=>'Lebanon', 'LS'=>'Lesotho', 'LR'=>'Liberia', 'LY'=>'Libya', 'LI'=>'Liechtenstein', 'LT'=>'Lithuania', 'LU'=>'Luxembourg', 'MO'=>'Macao', 'MK'=>'Macedonia', 'MG'=>'Madagascar', 'MW'=>'Malawi', 'MY'=>'Malaysia', 'MV'=>'Maldives', 'ML'=>'Mali', 'MT'=>'Malta', 'MH'=>'Marshall Islands', 'MQ'=>'Martinique', 'MR'=>'Mauritania', 'YT'=>'Mayotte', 'MX'=>'Mexico', 'FM'=>'Micronesia', 'MD'=>'Moldova', 'MC'=>'Monaco', 'MN'=>'Mongolia', 'MS'=>'Montserrat', 'MA'=>'Morocco', 'MZ'=>'Mozambique', 'MN'=>'Myanmar', 'NA'=>'Namibia', 'NR'=>'Nauru', 'NP'=>'Nepal', 'NL'=>'Netherlands', 'NC'=>'New Caledonia', 'NZ'=>'New Zealand', 'NI'=>'Nicaragua', 'NE'=>'Niger', 'NG'=>'Nigeria', 'NU'=>'Niue', 'NF'=>'Norfolk Islands', 'NP'=>'Northern Marianas', 'NO'=>'Norway', 'OM'=>'Oman', 'PW'=>'Palau', 'PA'=>'Panama', 'PG'=>'Papua New Guinea', 'PY'=>'Paraguay', 'PE'=>'Peru', 'PH'=>'Philippines', 'PL'=>'Poland', 'PT'=>'Portugal', 'PR'=>'Puerto Rico', 'QA'=>'Qatar', 'RE'=>'Reunion', 'RO'=>'Romania', 'RU'=>'Russia', 'RW'=>'Rwanda', 'SM'=>'San Marino', 'ST'=>'Sao Tome &amp; Principe', 'SA'=>'Saudi Arabia', 'SN'=>'Senegal', 'CS'=>'Serbia', 'SC'=>'Seychelles', 'SL'=>'Sierra Leone', 'SG'=>'Singapore', 'SK'=>'Slovak Republic', 'SI'=>'Slovenia', 'SB'=>'Solomon Islands', 'SO'=>'Somalia', 'ZA'=>'South Africa', 'ES'=>'Spain', 'LK'=>'Sri Lanka', 'SH'=>'St. Helena', 'KN'=>'St. Kitts', 'SC'=>'St. Lucia', 'SD'=>'Sudan', 'SR'=>'Suriname', 'SZ'=>'Swaziland', 'SE'=>'Sweden', 'CH'=>'Switzerland', 'SI'=>'Syria', 'TW'=>'Taiwan', 'TJ'=>'Tajikstan', 'TH'=>'Thailand', 'TG'=>'Togo', 'TO'=>'Tonga', 'TT'=>'Trinidad &amp; Tobago', 'TN'=>'Tunisia', 'TR'=>'Turkey', 'TM'=>'Turkmenistan', 'TM'=>'Turkmenistan', 'TC'=>'Turks &amp; Caicos Islands', 'TV'=>'Tuvalu', 'UG'=>'Uganda', 'GB'=>'UK', 'UA'=>'Ukraine', 'AE'=>'United Arab Emirates', 'UY'=>'Uruguay', 'UZ'=>'Uzbekistan', 'VU'=>'Vanuatu', 'VA'=>'Vatican City', 'VE'=>'Venezuela', 'VN'=>'Vietnam', 'VG'=>'Virgin Islands - British', 'VI'=>'Virgin Islands - US', 'WF'=>'Wallis &amp; Futuna', 'YE'=>'Yemen', 'ZM'=>'Zambia', 'ZW'=>'Zimbabwe');


  static function optionListFrom($pOptions=null, $pValue=null)
  {
    if ($pValue!==null)
      return str_replace('value="'.$pValue.'"', 'value="'.$pValue.'" selected', $pOptions);

    return $pOptions;
  }

  static function optionValueCountry($pValue=null)
  {
    if (empty($pValue))
      return '';

    foreach (self::$countries as $k=>$v)
      if ($pValue==$k)
        return $v;

    return '';
  }

  static function optionListCountry($pValue=null)
  {
    $out='<option></option>';
    foreach (self::$countries as $k=>$v)
      $out.='<option value="'.$k.'">'.$v.'</option>';

    if ($pValue!==null)
      $pValue=strtoupper($pValue);

    return self::optionListFrom($out, $pValue);
  }

  static function __loadFromDB($pTable)
  {
    $column=$pTable=='users' ? 'name' : 'value';
    $where=$pTable=='users' ? ' where status="active" ' : '';

    if (empty(self::$optionList[$pTable]))
    {
      $rows=DB::select("select id, $column as value, deleted_at from $pTable $where");

      self::$optionList[$pTable]=[];
      foreach ($rows as $row)
        self::$optionList[$pTable][$row->id]=['value'=>$row->value, 'deleted'=> $row->deleted_at ? 1 : 0];
    }

    return self::$optionList[$pTable];
  }

  static function optionListFromDB($pTable='', $pValue=null)
  {
    if (empty($pTable))
      return '';

    $rows=self::__loadFromDB($pTable);

    if (empty($rows))
      return '';

    $out='<option></option>';
    foreach ($rows as $k=>$v)
      if (!$v['deleted'])
        $out.='<option value="'.$k.'">'.$v['value'].'</option>'."\n";

    if ($pValue!==null)
      $out=str_replace('value="'.$pValue.'"', 'value="'.$pValue.'" selected', $out);

    return $out;
  }

  static function optionValueFromDB($pTable='', $pValue=null)
  {
    if (empty($pValue))
      return '';

    $rows=self::__loadFromDB($pTable);

    if (empty($rows))
      return '';

    return isset($rows[$pValue]) ? $rows[$pValue]['value'] : '';
  }


  static function valueFromDB($pTable='', $pValue=null)
  {
    if (empty($pValue))
      return '';

    $column='';

    switch($pTable)
    {
      case 'users':
      case 'accounts':
      case 'opportunities' : $column='name';
      break;

      case 'leads' :
      case 'contacts' : $column=' concat(first_name, " ", last_name)';
      break;

      default: $column='value';
    }

    $rows=DB::select("select id, $column as value from $pTable where id= ? limit 1", [$pValue]);

    return count($rows) ? $rows[0]->value : '';
  }
}