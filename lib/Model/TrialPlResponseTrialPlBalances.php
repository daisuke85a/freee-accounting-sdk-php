<?php
/**
 * TrialPlResponseTrialPlBalances
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * freee API
 *
 * <h1 id=\"freee_api\">freee API</h1> <hr /> <h2 id=\"start_guide\">スタートガイド</h2>  <p>freee API開発がはじめての方は<a href=\"https://developer.freee.co.jp/getting-started\">freee API スタートガイド</a>を参照してください。</p>  <hr /> <h2 id=\"specification\">仕様</h2>  <pre><code>【重要】会計freee APIの新バージョンについて 2020年12月まで、2つのバージョンが利用できる状態です。古いものは2020年12月に利用不可となります。<br> 新しいAPIを利用するにはリクエストヘッダーに以下を指定します。 X-Api-Version: 2020-06-15<br> 指定がない場合は2020年12月に廃止予定のAPIを利用することとなります。<br> 【重要】APIのバージョン指定をせずに利用し続ける場合 2020年12月に新しいバージョンのAPIに自動的に切り替わります。 詳細は、<a href=\"https://developer.freee.co.jp/release-note/2948\" target=\"_blank\">リリースノート</a>をご覧ください。<br> 旧バージョンのAPIリファレンスを確認したい場合は、<a href=\"https://freee.github.io/freee-api-schema/\" target=\"_blank\">旧バージョンのAPIリファレンスページ</a>をご覧ください。 </code></pre>  <h3 id=\"api_endpoint\">APIエンドポイント</h3>  <p>https://api.freee.co.jp/ (httpsのみ)</p>  <h3 id=\"about_authorize\">認証について</h3> <p>OAuth2.0を利用します。詳細は<a href=\"https://developer.freee.co.jp/docs\" target=\"_blank\">ドキュメントの認証</a>パートを参照してください。</p>  <h3 id=\"data_format\">データフォーマット</h3>  <p>リクエスト、レスポンスともにJSON形式をサポートしていますが、詳細は、API毎の説明欄（application/jsonなど）を確認してください。</p>  <h3 id=\"compatibility\">後方互換性ありの変更</h3>  <p>freeeでは、APIを改善していくために以下のような変更は後方互換性ありとして通知なく変更を入れることがあります。アプリケーション実装者は以下を踏まえて開発を行ってください。</p>  <ul> <li>新しいAPIリソース・エンドポイントの追加</li> <li>既存のAPIに対して必須ではない新しいリクエストパラメータの追加</li> <li>既存のAPIレスポンスに対する新しいプロパティの追加</li> <li>既存のAPIレスポンスに対するプロパティの順番の入れ変え</li> <li>keyとなっているidやcodeの長さの変更（長くする）</li> </ul>  <h3 id=\"common_response_header\">共通レスポンスヘッダー</h3>  <p>すべてのAPIのレスポンスには以下のHTTPヘッダーが含まれます。</p>  <ul> <li> <p>X-Freee-Request-ID</p> <ul> <li>各リクエスト毎に発行されるID</li> </ul> </li> </ul>  <h3 id=\"common_error_response\">共通エラーレスポンス</h3>  <ul> <li> <p>ステータスコードはレスポンス内のJSONに含まれる他、HTTPヘッダにも含まれる</p> </li> <li> <p>一部のエラーレスポンスにはエラーコードが含まれます。<br>詳細は、<a href=\"https://developer.freee.co.jp/tips/faq/40x-checkpoint\">HTTPステータスコード400台エラー時のチェックポイント</a>を参照してください</p> </li> <p>type</p>  <ul> <li>status : HTTPステータスコードの説明</li>  <li>validation : エラーの詳細の説明（開発者向け）</li> </ul> </li> </ul>  <p>レスポンスの例</p>  <pre><code>  {     &quot;status_code&quot; : 400,     &quot;errors&quot; : [       {         &quot;type&quot; : &quot;status&quot;,         &quot;messages&quot; : [&quot;不正なリクエストです。&quot;]       },       {         &quot;type&quot; : &quot;validation&quot;,         &quot;messages&quot; : [&quot;Date は不正な日付フォーマットです。入力例：2013-01-01&quot;]       }     ]   }</code></pre>  </br>  <h3 id=\"api_rate_limit\">API使用制限</h3>    <p>freeeは一定期間に過度のアクセスを検知した場合、APIアクセスをコントロールする場合があります。</p>   <p>その際のhttp status codeは403となります。制限がかかってから10分程度が過ぎると再度使用することができるようになります。</p>  <h4 id=\"reports_api_endpoint\">/reportsエンドポイント</h4>  <p>freeeは/reportsエンドポイントに対して1秒間に10以上のアクセスを検知した場合、APIアクセスをコントロールする場合があります。その際のhttp status codeは429（too many requests）となります。</p>  <p>レスポンスボディのmetaプロパティに以下を含めます。</p>  <ul>   <li>設定されている上限値</li>   <li>上限に達するまでの使用可能回数</li>   <li>（上限値に達した場合）使用回数がリセットされる時刻</li> </ul>  <h3 id=\"plan_api_rate_limit\">プラン別のAPI Rate Limit</h3>   <table border=\"1\">     <tbody>       <tr>         <th style=\"padding: 10px\"><strong>会計freeeプラン名</strong></th>         <th style=\"padding: 10px\"><strong>事業所とアプリケーション毎に1日でのAPIコール数</strong></th>       </tr>       <tr>         <td style=\"padding: 10px\">エンタープライズ</td>         <td style=\"padding: 10px\">10,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">プロフェッショナル</td>         <td style=\"padding: 10px\">5,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ベーシック</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">ミニマム</td>         <td style=\"padding: 10px\">3,000</td>       </tr>       <tr>         <td style=\"padding: 10px\">上記以外</td>         <td style=\"padding: 10px\">3,000</td>       </tr>     </tbody>   </table>  <h3 id=\"webhook\">Webhookについて</h3>  <p>詳細は<a href=\"https://developer.freee.co.jp/docs/accounting/webhook\" target=\"_blank\">会計Webhook概要</a>を参照してください。</p>  <hr /> <h2 id=\"contact\">連絡先</h2>  <p>ご不明点、ご要望等は <a href=\"https://support.freee.co.jp/hc/ja/requests/new\">freee サポートデスクへのお問い合わせフォーム</a> からご連絡ください。</p> <hr />&copy; Since 2013 freee K.K.
 *
 * The version of the OpenAPI document: v1.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Freee\Accounting\Model;

use \ArrayAccess;
use \Freee\Accounting\ObjectSerializer;

/**
 * TrialPlResponseTrialPlBalances Class Doc Comment
 *
 * @category Class
 * @package  Freee\Accounting
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class TrialPlResponseTrialPlBalances implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'trialPlResponse_trial_pl_balances';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'account_category_name' => 'string',
        'account_group_name' => 'string',
        'account_item_id' => 'int',
        'account_item_name' => 'string',
        'closing_balance' => 'int',
        'composition_ratio' => 'float',
        'credit_amount' => 'int',
        'debit_amount' => 'int',
        'hierarchy_level' => 'int',
        'items' => '\Freee\Accounting\Model\TrialBsResponseTrialBsItems[]',
        'opening_balance' => 'int',
        'parent_account_category_name' => 'string',
        'partners' => '\Freee\Accounting\Model\TrialBsResponseTrialBsPartners[]',
        'sections' => '\Freee\Accounting\Model\TrialPlResponseTrialPlSections[]',
        'total_line' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'account_category_name' => null,
        'account_group_name' => null,
        'account_item_id' => null,
        'account_item_name' => null,
        'closing_balance' => null,
        'composition_ratio' => null,
        'credit_amount' => null,
        'debit_amount' => null,
        'hierarchy_level' => null,
        'items' => null,
        'opening_balance' => null,
        'parent_account_category_name' => null,
        'partners' => null,
        'sections' => null,
        'total_line' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'account_category_name' => 'account_category_name',
        'account_group_name' => 'account_group_name',
        'account_item_id' => 'account_item_id',
        'account_item_name' => 'account_item_name',
        'closing_balance' => 'closing_balance',
        'composition_ratio' => 'composition_ratio',
        'credit_amount' => 'credit_amount',
        'debit_amount' => 'debit_amount',
        'hierarchy_level' => 'hierarchy_level',
        'items' => 'items',
        'opening_balance' => 'opening_balance',
        'parent_account_category_name' => 'parent_account_category_name',
        'partners' => 'partners',
        'sections' => 'sections',
        'total_line' => 'total_line'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_category_name' => 'setAccountCategoryName',
        'account_group_name' => 'setAccountGroupName',
        'account_item_id' => 'setAccountItemId',
        'account_item_name' => 'setAccountItemName',
        'closing_balance' => 'setClosingBalance',
        'composition_ratio' => 'setCompositionRatio',
        'credit_amount' => 'setCreditAmount',
        'debit_amount' => 'setDebitAmount',
        'hierarchy_level' => 'setHierarchyLevel',
        'items' => 'setItems',
        'opening_balance' => 'setOpeningBalance',
        'parent_account_category_name' => 'setParentAccountCategoryName',
        'partners' => 'setPartners',
        'sections' => 'setSections',
        'total_line' => 'setTotalLine'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_category_name' => 'getAccountCategoryName',
        'account_group_name' => 'getAccountGroupName',
        'account_item_id' => 'getAccountItemId',
        'account_item_name' => 'getAccountItemName',
        'closing_balance' => 'getClosingBalance',
        'composition_ratio' => 'getCompositionRatio',
        'credit_amount' => 'getCreditAmount',
        'debit_amount' => 'getDebitAmount',
        'hierarchy_level' => 'getHierarchyLevel',
        'items' => 'getItems',
        'opening_balance' => 'getOpeningBalance',
        'parent_account_category_name' => 'getParentAccountCategoryName',
        'partners' => 'getPartners',
        'sections' => 'getSections',
        'total_line' => 'getTotalLine'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['account_category_name'] = $data['account_category_name'] ?? null;
        $this->container['account_group_name'] = $data['account_group_name'] ?? null;
        $this->container['account_item_id'] = $data['account_item_id'] ?? null;
        $this->container['account_item_name'] = $data['account_item_name'] ?? null;
        $this->container['closing_balance'] = $data['closing_balance'] ?? null;
        $this->container['composition_ratio'] = $data['composition_ratio'] ?? null;
        $this->container['credit_amount'] = $data['credit_amount'] ?? null;
        $this->container['debit_amount'] = $data['debit_amount'] ?? null;
        $this->container['hierarchy_level'] = $data['hierarchy_level'] ?? null;
        $this->container['items'] = $data['items'] ?? null;
        $this->container['opening_balance'] = $data['opening_balance'] ?? null;
        $this->container['parent_account_category_name'] = $data['parent_account_category_name'] ?? null;
        $this->container['partners'] = $data['partners'] ?? null;
        $this->container['sections'] = $data['sections'] ?? null;
        $this->container['total_line'] = $data['total_line'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['account_item_id']) && ($this->container['account_item_id'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'account_item_id', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['account_item_id']) && ($this->container['account_item_id'] < 1)) {
            $invalidProperties[] = "invalid value for 'account_item_id', must be bigger than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets account_category_name
     *
     * @return string|null
     */
    public function getAccountCategoryName()
    {
        return $this->container['account_category_name'];
    }

    /**
     * Sets account_category_name
     *
     * @param string|null $account_category_name 勘定科目カテゴリー名
     *
     * @return self
     */
    public function setAccountCategoryName($account_category_name)
    {
        $this->container['account_category_name'] = $account_category_name;

        return $this;
    }

    /**
     * Gets account_group_name
     *
     * @return string|null
     */
    public function getAccountGroupName()
    {
        return $this->container['account_group_name'];
    }

    /**
     * Sets account_group_name
     *
     * @param string|null $account_group_name 決算書表示名(account_item_display_type:group指定時に決算書表示名の時のみ含まれる)
     *
     * @return self
     */
    public function setAccountGroupName($account_group_name)
    {
        $this->container['account_group_name'] = $account_group_name;

        return $this;
    }

    /**
     * Gets account_item_id
     *
     * @return int|null
     */
    public function getAccountItemId()
    {
        return $this->container['account_item_id'];
    }

    /**
     * Sets account_item_id
     *
     * @param int|null $account_item_id 勘定科目ID(勘定科目の時のみ含まれる)
     *
     * @return self
     */
    public function setAccountItemId($account_item_id)
    {

        if (!is_null($account_item_id) && ($account_item_id > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $account_item_id when calling TrialPlResponseTrialPlBalances., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($account_item_id) && ($account_item_id < 1)) {
            throw new \InvalidArgumentException('invalid value for $account_item_id when calling TrialPlResponseTrialPlBalances., must be bigger than or equal to 1.');
        }

        $this->container['account_item_id'] = $account_item_id;

        return $this;
    }

    /**
     * Gets account_item_name
     *
     * @return string|null
     */
    public function getAccountItemName()
    {
        return $this->container['account_item_name'];
    }

    /**
     * Sets account_item_name
     *
     * @param string|null $account_item_name 勘定科目名(勘定科目の時のみ含まれる)
     *
     * @return self
     */
    public function setAccountItemName($account_item_name)
    {
        $this->container['account_item_name'] = $account_item_name;

        return $this;
    }

    /**
     * Gets closing_balance
     *
     * @return int|null
     */
    public function getClosingBalance()
    {
        return $this->container['closing_balance'];
    }

    /**
     * Sets closing_balance
     *
     * @param int|null $closing_balance 期末残高
     *
     * @return self
     */
    public function setClosingBalance($closing_balance)
    {
        $this->container['closing_balance'] = $closing_balance;

        return $this;
    }

    /**
     * Gets composition_ratio
     *
     * @return float|null
     */
    public function getCompositionRatio()
    {
        return $this->container['composition_ratio'];
    }

    /**
     * Sets composition_ratio
     *
     * @param float|null $composition_ratio 構成比
     *
     * @return self
     */
    public function setCompositionRatio($composition_ratio)
    {
        $this->container['composition_ratio'] = $composition_ratio;

        return $this;
    }

    /**
     * Gets credit_amount
     *
     * @return int|null
     */
    public function getCreditAmount()
    {
        return $this->container['credit_amount'];
    }

    /**
     * Sets credit_amount
     *
     * @param int|null $credit_amount 貸方金額
     *
     * @return self
     */
    public function setCreditAmount($credit_amount)
    {
        $this->container['credit_amount'] = $credit_amount;

        return $this;
    }

    /**
     * Gets debit_amount
     *
     * @return int|null
     */
    public function getDebitAmount()
    {
        return $this->container['debit_amount'];
    }

    /**
     * Sets debit_amount
     *
     * @param int|null $debit_amount 借方金額
     *
     * @return self
     */
    public function setDebitAmount($debit_amount)
    {
        $this->container['debit_amount'] = $debit_amount;

        return $this;
    }

    /**
     * Gets hierarchy_level
     *
     * @return int|null
     */
    public function getHierarchyLevel()
    {
        return $this->container['hierarchy_level'];
    }

    /**
     * Sets hierarchy_level
     *
     * @param int|null $hierarchy_level 階層レベル
     *
     * @return self
     */
    public function setHierarchyLevel($hierarchy_level)
    {
        $this->container['hierarchy_level'] = $hierarchy_level;

        return $this;
    }

    /**
     * Gets items
     *
     * @return \Freee\Accounting\Model\TrialBsResponseTrialBsItems[]|null
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \Freee\Accounting\Model\TrialBsResponseTrialBsItems[]|null $items breakdown_display_type:item, account_item_display_type:account_item指定時のみ含まれる
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets opening_balance
     *
     * @return int|null
     */
    public function getOpeningBalance()
    {
        return $this->container['opening_balance'];
    }

    /**
     * Sets opening_balance
     *
     * @param int|null $opening_balance 期首残高
     *
     * @return self
     */
    public function setOpeningBalance($opening_balance)
    {
        $this->container['opening_balance'] = $opening_balance;

        return $this;
    }

    /**
     * Gets parent_account_category_name
     *
     * @return string|null
     */
    public function getParentAccountCategoryName()
    {
        return $this->container['parent_account_category_name'];
    }

    /**
     * Sets parent_account_category_name
     *
     * @param string|null $parent_account_category_name 上位勘定科目カテゴリー名(勘定科目カテゴリーの時のみ、上層が存在する場合含まれる)
     *
     * @return self
     */
    public function setParentAccountCategoryName($parent_account_category_name)
    {
        $this->container['parent_account_category_name'] = $parent_account_category_name;

        return $this;
    }

    /**
     * Gets partners
     *
     * @return \Freee\Accounting\Model\TrialBsResponseTrialBsPartners[]|null
     */
    public function getPartners()
    {
        return $this->container['partners'];
    }

    /**
     * Sets partners
     *
     * @param \Freee\Accounting\Model\TrialBsResponseTrialBsPartners[]|null $partners breakdown_display_type:partner, account_item_display_type:account_item指定時のみ含まれる
     *
     * @return self
     */
    public function setPartners($partners)
    {
        $this->container['partners'] = $partners;

        return $this;
    }

    /**
     * Gets sections
     *
     * @return \Freee\Accounting\Model\TrialPlResponseTrialPlSections[]|null
     */
    public function getSections()
    {
        return $this->container['sections'];
    }

    /**
     * Sets sections
     *
     * @param \Freee\Accounting\Model\TrialPlResponseTrialPlSections[]|null $sections breakdown_display_type:section, account_item_display_type:account_item指定時のみ含まれる
     *
     * @return self
     */
    public function setSections($sections)
    {
        $this->container['sections'] = $sections;

        return $this;
    }

    /**
     * Gets total_line
     *
     * @return bool|null
     */
    public function getTotalLine()
    {
        return $this->container['total_line'];
    }

    /**
     * Sets total_line
     *
     * @param bool|null $total_line 合計行(勘定科目カテゴリーの時のみ含まれる)
     *
     * @return self
     */
    public function setTotalLine($total_line)
    {
        $this->container['total_line'] = $total_line;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


