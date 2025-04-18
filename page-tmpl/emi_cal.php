<?php

/**
 * Template Name: EMI Calculator
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pioneer_property
 */

get_header();

?>


<main>

    <!-- Inner hero section start -->
    <section class="inner_hero wo_hr_line">
        <div class="container-fluid px-0">
            <div class="common_wrapper px-0">
                <div class="row">
                    <div class="col-lg-12 px-0">
                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <div class="banner" style="background-image: url(<?php echo $featured_image;?>)">
                            <div class="overlay"></div>
                            <div class="banner-content">
                                <h1><?php echo the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner hero section end -->


    <!-- emi Section start -->
    <section class="emi_sec py-5">
        <div class="mod-content">
            <div class="mod-body">
                <div class="calculator">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="loan-form">
                                <div class="form-group">
                                    <div class="box">
                                        <label for="loan-amount"> Home Loan Amount </label>
                                        <div class="right">
                                            <p>₹</p>
                                            <input type="text" id="loan-amount-value" value="100000" />
                                        </div>
                                    </div>
                                    <input type="range" id="loan-amount" min="100000" max="20000000" step="10000"
                                        value="500000" />
                                </div>
                                <div class="form-group">
                                    <div class="box">
                                        <label for="loan-term"> Loan Tenure </label>
                                        <div class="right">
                                            <div class="tenure-switch">
                                                <input type="radio" id="tenure-years" name="tenure-type" value="Years"
                                                    checked />
                                                <label for="tenure-years">Yr</label>
                                                <input type="radio" id="tenure-months" name="tenure-type"
                                                    value="Months" />
                                                <label for="tenure-months">Mo</label>
                                            </div>
                                            <input type="text" id="loan-term-value" value="19" />
                                        </div>
                                    </div>

                                    <input type="range" id="loan-term" min="1" max="30" step="1" value="20" />
                                </div>
                                <div class="form-group">
                                    <div class="box">
                                        <label for="interest-rate"> Interest Rate </label>
                                        <div class="right">
                                            <p>%</p>
                                            <input type="text" value="7" id="interest-rate-value" min="0" max="20" step="0.01">
                                        </div>
                                    </div>
                                    <input type="range" id="interest-rate" min="1" max="20" step="0.01" value="7" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="results" class="results">
                                <h2>Detailed Calculations</h2>
                                <div class="calculation-item">
                                    <div class="label">EMI per Month</div>
                                    <div class="value" id="emi"></div>
                                </div>
                                <div class="calculation-item">
                                    <div class="label">Total Interest Payable</div>
                                    <div class="value" id="total-interest"></div>
                                </div>
                                <div class="calculation-item">
                                    <div class="label">Total Amount Payable</div>
                                    <div class="value" id="total-amount"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- emi section end -->
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const loanAmountSlider = document.getElementById("loan-amount");
        const loanTenureSlider = document.getElementById("loan-term");
        const interestRateSlider = document.getElementById("interest-rate");

        const loanAmountValue = document.getElementById("loan-amount-value");
        const loanTenureValue = document.getElementById("loan-term-value");
        const interestRateValue = document.getElementById("interest-rate-value");

        const emiAmount = document.getElementById("emi");
        const totalInterest = document.getElementById("total-interest");
        const totalPayment = document.getElementById("total-amount");

        const tenureYearsRadio = document.getElementById("tenure-years");
        const tenureMonthsRadio = document.getElementById("tenure-months");

        let isYears = true;

        function calculateEMI() {
            const principal = parseFloat(loanAmountSlider.value);
            const tenure = isYears
                ? parseFloat(loanTenureSlider.value) * 12
                : parseFloat(loanTenureSlider.value);
            const rate = parseFloat(interestRateSlider.value) / 12 / 100;

            const emi = (principal * rate * Math.pow(1 + rate, tenure)) / (Math.pow(1 + rate, tenure) - 1);
            const totalPaymentAmount = emi * tenure;
            const totalInterestAmount = totalPaymentAmount - principal;

            emiAmount.textContent = emi.toFixed(2);
            totalInterest.textContent = totalInterestAmount.toFixed(2);
            totalPayment.textContent = totalPaymentAmount.toFixed(2);
        }

        function updateValues() {
            loanAmountSlider.value = loanAmountValue.value;
            loanTenureSlider.value = loanTenureValue.value;
            interestRateSlider.value = interestRateValue.value;
            calculateEMI();
        }

        loanAmountSlider.addEventListener("input", function () {
            loanAmountValue.value = loanAmountSlider.value;
            updateValues();
        });

        loanTenureSlider.addEventListener("input", function () {
            loanTenureValue.value = loanTenureSlider.value;
            updateValues();
        });

        interestRateSlider.addEventListener("input", function () {
            interestRateValue.value = interestRateSlider.value;
            updateValues();
        });

        loanAmountValue.addEventListener("input", function () {
            loanAmountSlider.value = loanAmountValue.value;
            updateValues();
        });

        loanTenureValue.addEventListener("input", function () {
            loanTenureSlider.value = loanTenureValue.value;
            updateValues();
        });

        interestRateValue.addEventListener("input", function () {
            interestRateSlider.value = interestRateValue.value;
            updateValues();
        });

        tenureYearsRadio.addEventListener("change", function () {
            isYears = true;
            loanTenureSlider.max = 30;

            if (parseFloat(loanTenureSlider.value) > 30) {
                loanTenureSlider.value = 10;
            }

            updateValues();
        });

        tenureMonthsRadio.addEventListener("change", function () {
            isYears = false;
            loanTenureSlider.max = 360;
            loanTenureSlider.value = parseFloat(loanTenureSlider.value) * 12;
            updateValues();
        });
        updateValues();
    });

    document.getElementById('interest-rate-value').addEventListener('input', function() {
    let value = parseFloat(this.value);
    if (value > 20) {
        this.value = 20; 
    } else if (value < 0) {
        this.value = 0; 
    }
});

</script>

</main>

<?php
get_footer();?>