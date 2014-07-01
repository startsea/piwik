<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\Goals\Columns;

use Piwik\Plugin\Dimension\Conversion;
use Piwik\Tracker\GoalManager;

abstract class BaseConversion extends Conversion
{
    /**
     * Returns rounded decimal revenue, or if revenue is integer, then returns as is.
     *
     * @param int|float $revenue
     * @return int|float
     */
    protected function roundRevenueIfNeeded($revenue)
    {
        if (false === $revenue) {
            return false;
        }

        if (round($revenue) == $revenue) {
            return $revenue;
        }

        return round($revenue, GoalManager::REVENUE_PRECISION);
    }
}