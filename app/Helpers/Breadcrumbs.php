<?php
namespace App\Helpers;
class Breadcrumbs
{

    protected $breadcrumbs = array();

    protected $breadcrumbsCssClasses = array();
    protected $divider = '/';
    protected $listElement = 'ul';
    public function __construct($breadcrumbs = array())
    {
        $this->setBreadcrumbs($breadcrumbs);
        $this->setCssClasses('breadcrumb');
    }

    public function setBreadcrumbs($breadcrumbs)
    {
        foreach ($breadcrumbs as $key => $breadcrumb) {
          $this->addCrumb(
                    $breadcrumb['name'] ?: '',
                    $breadcrumb['href'] ?: '',
                    isset($breadcrumb['hrefIsFullUrl']) ? (bool) $breadcrumb['hrefIsFullUrl'] : false
                );
            }

        return $this;
    }

    public function addCrumb($name = '', $href = '', $hrefIsFullUrl = false)
    {
        if (mb_substr($href, 0, 1) === '/') {
            $length = mb_strlen($href);
            $href = mb_substr($href, 1, $length - 1);
            $this->addCrumb($name, $href, true);
        } elseif ((mb_substr($href, 0, 7) === 'http://') && !$hrefIsFullUrl) {
            $this->addCrumb($name, $href, true);
        } elseif ((mb_substr($href, 0, 8) === 'https://') && !$hrefIsFullUrl) {
            $this->addCrumb($name, $href, true);
        } else {
            $crumb = array(
                'name' => $name,
                'href' => $href,
                'hrefIsFullUrl' => $hrefIsFullUrl,
            );
            $this->breadcrumbs[] = $crumb;
        }
        return $this;
    }
    public function add($name = '', $href = '', $hrefIsFullUrl = false)
    {
        return $this->addCrumb($name, $href, $hrefIsFullUrl);
    }


    public function setCssClasses($cssClasses)
    {
        if (is_string($cssClasses)) {
            $cssClasses = explode(' ', $cssClasses);
        }
        $this->breadcrumbsCssClasses = array_unique($cssClasses);
        return $this;
    }
    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }
    public function count()
    {
        return count($this->breadcrumbs);
    }
    public function isEmpty()
    {
        return $this->count() === 0;
    }
    public function removeAll()
    {
        $this->breadcrumbs = array();
        return $this;
    }
    protected function renderCrumb($name, $href, $isLast = false, $position = null)
    {
        if ($this->divider) {
            $divider = " <span class=\"divider\">{$this->divider}</span>";
        } else {
            $divider = '';
        }
        if ($position != null) {
            $positionMeta = "<meta content=\"{$position}\" />";
        } else {
            $positionMeta = "";
        }
        if (!$isLast) {
            return '<li>'
                . "<a href=\"{$href}\"><span>{$name}</span></a>"
                . "{$positionMeta}{$divider}</li>";
        } else {
            return '<li '
                . "class=\"active\"><span>{$name}</span>"
                . "{$positionMeta}</li>";
        }
    }
    protected function renderCrumbs()
    {
        end($this->breadcrumbs);
        $lastKey = key($this->breadcrumbs);
        $output = '';
        $hrefSegments = array();
        $position = 1;
        foreach ($this->breadcrumbs as $key => $crumb) {
            $isLast = ($lastKey === $key);
            if ($crumb['hrefIsFullUrl']) {
                $hrefSegments = array();
            }
            if ($crumb['href']) {
                $hrefSegments[] = $crumb['href'];
            }
            $href = implode('/', $hrefSegments);
            if (!preg_match('#^https?://.*#', $href)) {
                $href = "/{$href}";
            }
            $output .= $this->renderCrumb($crumb['name'], $href, $isLast, $position);
            $position++;
        }
        return $output;
    }
    public function render()
    {
        if (empty($this->breadcrumbs)) {
            return '';
        }
        $cssClasses = implode(' ', $this->breadcrumbsCssClasses);
        return '<'. $this->listElement
                .' class="' . $cssClasses .'">'
                . $this->renderCrumbs()
                . '</'. $this->listElement .'>';
    }
    public function __toString()
    {
        return $this->render();
    }
}
