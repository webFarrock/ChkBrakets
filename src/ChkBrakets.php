<?
namespace Webfarrock;

class ChkBrakets
{

    private static function isValid($in)
    {
        return preg_match("#^[\(\)\s]+$#", $in);
    }

    private static function clear($in)
    {
        return preg_replace('/[^\(\)]/', '', $in);
    }

    private static function chk($in)
    {
        while (substr_count($in, '()')) {
            $in = str_replace('()', '', $in);
        }
        return !boolval($in);
    }

    public static function run($in)
    {
        if (!self::isValid($in)) {
            throw new \InvalidArgumentException('Input was: '.$in);
        }

        $in = self::clear($in);

        return self::chk($in);
    }
}

