let $saveButton;
function renderPaymentGraph()
{
    let $startDate = $('#credit-start_date').val(),
        $creditValue = $('#sum-input').val(),
        $monthPeriod = $('#month-sum-input').val(),
        $percentValue = $('#percent-input').val();
    if($startDate !== '' && $creditValue !== '' && $monthPeriod !== '' && $percentValue !== '') {
        $.ajax({
            type: 'POST',
            cache: false,
            url: '/site/get-payment-graph',
            data: {
                'startDate': $startDate,
                'value': $creditValue,
                'monthPeriod': $monthPeriod,
                'percent': $percentValue
            },
            success: function (response) {
                $('#graph-container').empty().append(response);
                $saveButton.removeAttr('disabled');
            }
        });
    }
}

$(document).ready(function () {
    $saveButton = $('#save-calculation-button');
    $saveButton.attr('disabled', true);
})

$(document).delegate('#credit-start_date', 'change', function () {
    renderPaymentGraph();
});

$(document).delegate('#sum-input', 'change', function () {
    renderPaymentGraph();
});

$(document).delegate('#month-sum-input', 'change', function () {
    renderPaymentGraph();
});

$(document).delegate('#percent-input', 'change', function () {
    renderPaymentGraph();
});