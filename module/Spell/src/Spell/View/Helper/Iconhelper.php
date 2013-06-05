<?php
namespace Spell\View\Helper;
use Zend\View\Helper\AbstractHelper;
 
class Iconhelper extends AbstractHelper
{
    public function __invoke($icon, $name, $link='', $data=array())
    {
        $sHtml = '<span class="icon_' . $name . '_wrapper">';
        $sHtml .= ($link ? '<a href="' . $link . '" class="icon_' . $name . '_link" >' : '');
        $sHtml .= '<img src="/img/icon/' . $icon . '" class="icon_' . $name . '" data-xtype="' . $name . '"';
        foreach($data as $key=>$value) {
            $sHtml .= ' data-' . $key . '="' . $value . '"';            
        }
        $sHtml .= ' title="' . ucfirst($name) . '">';
        $sHtml .= ($link ? '</a>' : '');
        $sHtml .= '</span>';
        return $sHtml;
    }
      
}
