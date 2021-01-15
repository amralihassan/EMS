<?php

namespace Student\Models\Settings\Operations;

use Student\Models\Settings\ReportForm;

class ReportFormOp extends ReportForm
{
    private static function attributes()
    {
        return ['accepted', 'daily_request', 'proof_enrollment', 'parent_request', 'withdrawal_request'];
    }

    public static function fetchById($id)
    {
        return ReportForm::findOrFail($id);
    }

    public static function _update($request, $id)
    {
        $report_form = ReportForm::findOrFail($id);
        $report_form->update($request->only(self::attributes()));
    }

}
