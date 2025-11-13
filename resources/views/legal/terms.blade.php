@extends('layouts.public')

@section('content')
    <!-- Banner Area -->
    <section class="banner_area">
        <div class="container">
            <h6>Terms</h6>
            <h2>Terms & Conditions</h2>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/terms-and-conditions') }}" class="active">Terms & Conditions</a></li>
            </ol>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- T&C Content -->
    <section class="privacy_policy_area py-5">
        <div class="container">
            <div class="content mx-auto">
                <h2 class="mb-3">Terms & Conditions – KredifyLoans.com</h2>

                <h4 class="mb-3">Introduction</h4>

                <p class="mb-3">
                    In these Terms & Conditions, terms like “we”, “our”, “company”, and “us” refer to <strong>Kredify
                        Loans</strong> and all associated systems and entities. The terms “you” and “your” refer to the
                    users, customers, or visitors of <strong>Kredify Loans</strong>’ platform.
                </p>

                <p class="mb-3">
                    These Terms & Conditions govern the usage of our website (<a
                        href="https://kredifyloans.com">www.kredifyloans.com</a>) and apply to all individuals interacting
                    with the platform — including customers, employees, and general users. Terms may differ slightly based
                    on your role. Please read them carefully before proceeding.
                </p>

                <p class="mb-3">
                    By accessing or using our services, you agree to be bound by these Terms & Conditions without limitation
                    or qualification. The Company offers its services only under the scope of these terms, and your
                    continued usage constitutes your unconditional acceptance.
                </p>

                <h4 class="mb-3">User Consent and Accuracy</h4>

                <p class="mb-3">
                    By engaging with our platform, you confirm that all the information you provide is accurate and
                    authentic. This includes but is not limited to:
                </p>

                <ol class="mb-4">
                    <li class="mb-2">Personal details submitted through application forms (e.g., name, address, marital
                        status, employment, assets, income).</li>
                    <li>Financial or account-related information received directly from you or via third parties such as
                        banks, brokers, custodians, and financial institutions.</li>
                </ol>

                <h4 class="mb-3">Prohibited Conduct</h4>

                <p class="mb-4">
                    Any attempt to defame, spread false information, or harm the reputation of Kredify Loans or its team
                    members—whether online or offline—will result in strict legal action. The company reserves the right to
                    protect its image and initiate legal proceedings against individuals or groups involved in such
                    misconduct.
                </p>
                <p class="mb-3">
                    We take the protection of our users seriously and are committed to addressing any potential privacy
                    concerns. These Terms & Conditions apply to all users globally and govern how our services are accessed
                    and used.
                </p>

                <p class="mb-4">
                    These terms apply to all information—regardless of format—related to <strong>Kredify Loans'</strong>
                    business operations worldwide. They also govern any data handled by us in association with other
                    organizations we work with. Additionally, these terms extend to all information systems and
                    communication technologies operated by or on behalf of Kredify Loans.
                </p>
                <h4 class="mb-3">Membership Cards – Terms and Conditions</h4>

                <p class="mb-3">
                    Payment made for membership cards is eligible for a refund only under the conditions outlined in our <a
                        href="{{ url('/refund-policy') }}">Cancellation & Refund Policy</a>.
                </p>

                <p class="mb-3">
                    Membership cards issued by <strong>Kredify Loans</strong> are non-transferable and may only be used by
                    the individual who made the purchase. Each card is valid until its stated expiry date, as mentioned at
                    the time of issuance.
                </p>

                <p class="mb-3">
                    Renewal of membership cards is subject to the discretion of Kredify Loans and may be governed by updated
                    terms and conditions at the time of renewal.
                </p>

                <p class="mb-4">
                    Membership cards are intended solely for use on our platform <a
                        href="https://kredifyloans.com">kredifyloans.com</a> and cannot be used outside of our website.
                </p>
                <h4 class="mb-3">Customer Terms and Conditions</h4>

                <ol class="mb-4">
                    <li class="mb-2">
                        The payment of membership card fees is refundable only in accordance with the company's <a
                            href="{{ url('/refund-policy') }}">Cancellation & Refund Policy</a>.
                    </li>
                    <li class="mb-2">
                        Kredify Loans charges only for the membership card. No additional service fees or hidden charges are
                        applied.
                    </li>
                    <li class="mb-2">
                        Membership can be used exclusively for loan-related services and associated benefits. Purchasing a
                        membership card allows you to apply for a loan but does <strong>not guarantee loan
                            approval</strong>. Approval is based solely on bank evaluation and your customer profile. In
                        case of rejection, other benefits of the membership will still be available.
                    </li>
                    <li class="mb-2">
                        If a customer contacts us after viewing any promotional or advertisement content, it must be
                        understood that the loan application process begins <strong>only after</strong> purchasing a Kredify
                        Loans membership card. Even then, loan approval is not guaranteed and is subject to bank criteria
                        and the customer's profile. Ineligible customers will not receive a loan but may still access the
                        remaining membership benefits.
                    </li>
                    <li class="mb-2">
                        Membership cards are strictly non-transferable and can only be used by the original purchaser. Usage
                        by any third party, other individual, or source is strictly prohibited.
                    </li>
                    <li class="mb-2">
                        If a referral makes a payment through the referral link provided to a customer by the company, and
                        it reflects successfully in the customer’s dashboard, only then will the referral payout be
                        credited.
                    </li>
                    <li class="mb-2">
                        If a customer’s loan is approved through Kredify Loans but the customer voluntarily rejects or
                        denies the loan offer, the membership fee will remain non-refundable.
                    </li>
                    <li class="mb-2">
                        Any documents, cheques, or OTPs requested by company employees are solely for the purpose of
                        processing your loan application. Kredify Loans does not misuse any personal data. For added
                        security, customers may cancel their cheque after the loan process by visiting their respective
                        bank. The company will not be liable for any future issues or disputes related to such documents.
                    </li>
                    <li class="mb-2">
                        If you do not provide necessary documents, OTPs, or respond to document-related queries as requested
                        by the company for loan verification, your loan file may be rejected. (If your profile qualifies
                        without OTP, your file may still be processed.)
                    </li>
                    <li class="mb-2">
                        If any company executive asks for a payment transaction OTP, do <strong>not</strong> share it. The
                        company is not responsible for any loss if you make payments beyond the official membership fee.
                    </li>
                    <li class="mb-2">
                        For any questions or concerns regarding your loan application, you must contact the specific
                        department where your file is being processed.
                    </li>
                    <li class="mb-2">
                        Your documents will be verified across multiple partner banks. The company will proceed with your
                        loan application only in the banks where your documents match eligibility criteria. For example, if
                        your profile qualifies in 2 banks, your file will be submitted to those banks only. The internal
                        verification is done by company staff and is not accompanied by external proof.
                    </li>
                    <li class="mb-2">
                        If your documents do not meet any bank’s criteria, the company will provide a solution based on your
                        case. You may reapply after the recommended waiting period (as mentioned in your membership
                        details), and this update will be visible in your customer portal.
                    </li>
                    <li class="mb-2">
                        Loan applications are not limited to banks listed on the company website. Depending on your profile,
                        your file may be submitted to other eligible partner banks as well.
                    </li>
                    <li class="mb-2">
                        Kredify Loans only charges the membership fee. If you are charged by any third party outside our
                        official communication channels, the company is not liable for such transactions.
                    </li>
                    <li class="mb-2">
                        There are no processing fees or file charges required for loan approval. The only charge applicable
                        is for the membership, valid as per the Membership Card terms.
                    </li>
                    <li class="mb-2">
                        Customer files will only be submitted to banks that meet the customer's loan requirement. For
                        example, if a customer needs ₹1 lakh and a bank's criteria support only ₹50,000, that file will not
                        be logged into that bank.
                    </li>
                    <li class="mb-2">
                        The company will not disclose in writing or digitally which banks the customer’s file was logged
                        into.
                    </li>
                    <li class="mb-2">
                        Loan offers and pre-approval decisions depend entirely on the respective bank's rules and policies.
                        If your loan is approved by another lender or platform but rejected by Kredify Loans, the company
                        shall not be held responsible or compared with third-party processes.
                    </li>
                    <li class="mb-2">
                        Loan approval through Kredify Loans strictly depends on your profile and document eligibility. If
                        your documents align with the bank’s criteria, your loan will be processed.
                    </li>
                    <li class="mb-2">
                        Loan-related information will only be shared with the individual who applied for the loan. No
                        third-party inquiries will be entertained.
                    </li>
                    <li class="mb-2">
                        If the customer does not stay in communication with the company during the loan process for more
                        than 3 consecutive days, their application will be marked as rejected.
                    </li>
                    <li class="mb-2">
                        If your loan is rejected, you must re-submit your documents along with the recommended solution
                        provided by the company after the applicable waiting period (as per your Membership Card).
                    </li>
                    <li class="mb-2">
                        The company will not be responsible for any loan rejections caused due to bank-level queries or
                        decisions.
                    </li>
                    <li class="mb-2">
                        If your first loan attempt is rejected, the company will share the reason and a possible solution.
                        On reapplying, if the customer fails to implement the suggested solution, the file may be rejected
                        again. Final approval is still subject to your profile and the bank’s policies.
                    </li>
                    <li class="mb-2">
                        The reason for rejection will only be available inside the customer portal and will not be issued in
                        hard copy or soft copy. Some banks provide only generic rejection reasons, so the company cannot be
                        held liable for lack of detailed explanations.
                    </li>
                    <li class="mb-2">
                        Customers must provide accurate details regarding their CIBIL score and financial profile. Any
                        misinformation may lead to rejection, for which the company will not be responsible.
                    </li>
                    <li class="mb-2">
                        Kredify Loans does not provide CIBIL reports in any format — neither soft copy nor hard copy — under
                        any circumstances.
                    </li>
                    <li class="mb-2">
                        Any bank charges involved during the loan process will be governed by the respective bank’s rules
                        and are not controlled by Kredify Loans.
                    </li>
                    <li class="mb-2">
                        If a customer submits fake or forged documents, the company will initiate legal action, and the loan
                        process will be immediately halted. Kredify Loans will not hold any responsibility in such cases.
                    </li>
                    <li class="mb-2">
                        Once the customer's file is logged in, they must directly coordinate only with the login department
                        for any further process. Contacting telecallers or other departments will not be entertained.
                    </li>
                    <li class="mb-2">
                        If any bank updates or changes its rules during your loan processing, those new rules will apply
                        immediately, and the company will adhere to them.
                    </li>
                    <li class="mb-2">
                        Customers must provide their registered mobile number so the login department can contact them
                        regarding the loan process.
                    </li>
                    <li class="mb-2">
                        If there are queries during loan processing and the resolution requires more time, the company has
                        the right to extend the timeline. Customers are requested not to raise complaints in such cases.
                    </li>
                    <li class="mb-2">
                        If a customer wishes to reapply after a loan is approved or rejected, they must re-upload their
                        documents via the customer portal.
                    </li>
                    <li class="mb-2">
                        The loan eligibility shown on our website is based solely on the data you enter and is
                        system-generated. It reflects pre-approval, not final approval. Final approval is subject to
                        document verification and bank policies.
                    </li>
                    <li class="mb-2">
                        All promotional content (such as ads, banners, SMS, emails) from the company is a summary. Full
                        details, terms, and policies are explained on our website under Terms & Conditions and Privacy
                        Policy. Customers are advised to review these before using any service.
                    </li>
                    <li class="mb-2">
                        Membership Card activation happens only after payment is successfully received in the company’s bank
                        account. If your payment is debited but not received by the company due to third-party issues, the
                        company is not liable.
                    </li>
                    <li class="mb-2">
                        For referral payouts, the referral user must complete their account verification. If the payout is
                        deducted from the company's account but not credited to the referral’s account, the company will not
                        be held responsible.
                    </li>
                    <li class="mb-2">
                        Kredify Loans operates as a private limited company, working in partnership with multiple banks and
                        corporate DSAs to facilitate loan services.
                    </li>
                    <li class="mb-2">
                        Bank logos displayed on our website and advertisements are used purely for marketing purposes.
                        Presence of any bank logo does not imply partnership or endorsement unless explicitly stated.
                    </li>
                    <li class="mb-2">
                        If legal action is initiated against the company, only our legal advisor will handle the matter, and
                        legal proceedings shall exclusively take place in Dewas, Madhya Pradesh. No employee or director shall be
                        directly contacted in this regard.
                    </li>
                    <li class="mb-2">
                        If anyone has concerns or queries regarding the company’s terms and conditions, they are encouraged
                        to contact the company directly for clarification.
                    </li>
                    <li class="mb-2">
                        Membership is only available to individuals aged between 18 and 62 years. Only those within this age
                        bracket are eligible to avail benefits from our Membership Card.
                    </li>
                    <li class="mb-2">
                        Referral users who have referred others must submit their payout-related documents within 30 days.
                        If not submitted within the deadline, all referral payouts will be cancelled. Reinstatement of
                        cancelled payouts can be discussed by contacting the company.
                    </li>
                    <li class="mb-2">
                        A 5% TDS (Tax Deducted at Source) will be applicable on every referral payout.
                    </li>
                    <li class="mb-2">
                        For loan processing, the company will only interact with the individual who purchased the Membership
                        Card. No coordination will be entertained with any third party on behalf of the customer.
                    </li>
                    <li class="mb-2">
                        All bank-related payouts are subject to applicable tax deductions in accordance with the bank’s
                        terms and policies.
                    </li>
                    <li class="mb-2">
                        The company reserves the right to modify any terms, rules, or policies at any time. It is the
                        customer's responsibility to stay updated and accept such changes without objection.
                    </li>
                    <li class="mb-2">
                        While the company facilitates loan processing, the reference customer is responsible for managing
                        and supporting any user they have referred.
                    </li>
                    <li class="mb-2">
                        If any bank or company rule changes during the loan processing period, the customer must agree to
                        and follow the updated rules.
                    </li>
                    <li class="mb-2">
                        National holidays and bank holidays will not be considered business days. The company only operates
                        and processes files on standard working days.
                    </li>
                    <li class="mb-2">
                        Any promotional content containing phrases such as “Get Personal Loan in 30 mins” or “Get ₹5,00,000
                        in 5 mins” is solely intended for marketing purposes. Final loan disbursement timelines and
                        eligibility depend entirely on customer documentation and bank/NBFC rules.
                    </li>
                    <li class="mb-2">
                        On the website, pre-approved loan amounts are shown between ₹2 Lakhs and ₹8.5 Lakhs for system
                        consistency. The actual pre-approved amount may be higher or lower and is subject to verification by
                        the partnered NBFC or financial institution.
                    </li>
                    <li class="mb-2">
                        The initial login and processing of a customer’s file will be conducted by the company. For
                        reapplication, the customer is required to self-login and follow the necessary procedures.
                    </li>
                </ol>

                <h4 class="mt-4 mb-3">REFERENCE TERMS AND CONDITIONS</h4>
                <ol class="mb-4">
                    <li class="mb-2">
                        Reference payout will be given to eligible customers as per the official policies and rules defined
                        by our company.
                    </li>
                    <li class="mb-2">
                        The company provides payout only for Membership Card purchases; this payout is not dependent on
                        whether the referred customer's loan is approved or rejected.
                    </li>
                    <li class="mb-2">
                        Loan approval decisions are entirely based on the referred customer's profile. The company does not
                        assure loan approvals under any circumstance.
                    </li>
                    <li class="mb-2">
                        If customers wish to refer others for loan-related services, they must ensure the referral meets our
                        company’s specified eligibility criteria. Final decisions on file login rest solely with the
                        company’s login department, and must be accepted by the referring customer.
                    </li>
                    <li class="mb-2">
                        Any reference partner/customer found to have submitted fake documents will face strict legal action.
                        The company assumes no responsibility for the loan process in such cases.
                    </li>
                    <li class="mb-2">
                        All customer-related terms and conditions are also applicable to the customers referred by reference
                        partners.
                    </li>
                    <li class="mb-2">
                        Referral customer payments are managed through third-party payment gateways. The Membership Card
                        will only be activated once the payment is successfully received by the company. In the case of any
                        transaction failure where payment is debited but not received, the company holds no liability.
                    </li>
                    <li class="mb-2">
                        During promotional loan offers, the company may provide up to 35% payout per Membership Card to the
                        reference customer. However, invoice generation is mandatory for any payout to be processed.
                    </li>
                    <li class="mb-2">
                        If the referred customer processes the Membership purchase online, the payout will be credited to
                        the respective referral partner. However, if that amount is refunded to the customer for any reason,
                        the referral partner's corresponding payout will be adjusted in the next cycle.
                    </li>
                    <li class="mb-2">
                        Documents submitted by referral customers are kept securely within the company. In case of any
                        external misuse of such documents, the company shall not be held responsible.
                    </li>
                    <li class="mb-2">
                        Reference customers must submit their Payout Documents to the company within 30 days of the
                        referral. Failure to do so will result in automatic cancellation of all pending payouts. To reclaim
                        cancelled payouts, they must contact the company directly for resolution.
                    </li>
                    <li class="mb-2">
                        In case of any legal action against the company, only the company’s legal advisor will handle the
                        matter. All legal proceedings will be subject to the jurisdiction of Dewas, Madhya Pradesh. No employee or
                        director of the company can be contacted directly regarding such matters.
                    </li>
                    <li class="mb-2">
                        Any individual with questions or doubts related to the company’s terms and conditions should reach
                        out to the company’s official communication channels.
                    </li>
                    <li class="mb-2">
                        A 5% TDS (Tax Deducted at Source) will be applied to every referral payout.
                    </li>
                    <li class="mb-2">
                        Bank and office holidays are excluded from the company’s working/business days. All operations and
                        customer support will be handled only on standard working days.
                    </li>
                    <li class="mb-2">
                        The company holds no responsibility for any promotional activity conducted independently by a
                        Customer Reference. Such promotions are carried out solely at the risk of the reference customer,
                        and any losses or disputes arising from them are not the company’s liability.
                    </li>

                </ol>
                <h4 class="mt-4">GENERAL TERMS AND CONDITIONS</h4>
                <ol class="mb-4">
                    <li class="mb-2">
                        If the login department fails to handle customer queries with proper accuracy, responsibility, and
                        dedication, the company reserves the right to cancel the login department’s authorization.
                    </li>
                    <li class="mb-2">
                        The customer’s loan processing time may be extended during national holidays or festival periods.
                    </li>
                    <li class="mb-2">
                        Customers with GST must add their GST number in the portal to receive GST returns. If not received,
                        customers can raise a request or contact customer care between 10 AM to 5 PM, Monday to Saturday
                        (business days only).
                    </li>
                    <li class="mb-2">
                        The company uses third-party blog content for advertising purposes and does not guarantee the
                        correctness or reliability of the information presented in such blogs.
                    </li>
                    <li class="mb-2">
                        Any customer, employee, third party, or individual with a concern or dispute must notify the company
                        formally before initiating any legal action. The company shall attempt to resolve the issue first.
                    </li>
                    <li class="mb-2">
                        If any dispute or misunderstanding arises, the company holds the authority to make a final decision,
                        which must be accepted by the concerned individual or party.
                    </li>
                    <li class="mb-2">
                        Documents, cheques, and OTPs collected by the company's employees are solely for loan processing
                        purposes. The company is not responsible for any issues or disputes that may arise later.
                    </li>
                    <li class="mb-2">
                        In case of errors caused by technical issues on the website or software, the company retains the
                        right to make the final decision on such disputes, which must be accepted by all parties.
                    </li>
                    <li class="mb-2">
                        The company’s authorized personnel may modify the terms and conditions at any time. All users must
                        stay informed and agree to abide by the latest rules and regulations.
                    </li>
                    <li class="mb-2">
                        Any verbal or written commitment made by the company’s employees, salespersons, or telecallers must
                        be verified by checking the official Terms & Conditions section on the Kaushal Corporate website.
                        Only the website terms are considered legally binding.
                    </li>
                    <li class="mb-2">
                        All detailed criteria, terms, and explanations behind any promotional content (ads, social media
                        banners, SMS, emails, etc.) are clearly outlined in the Terms & Conditions and Privacy Policy on the
                        official website. Any person with doubts must consult the company’s customer care before proceeding
                        with services.
                    </li>
                    <li class="mb-2">
                        If a Customer Referral's referred customer receives a refund (due to a payment gateway error or any
                        other reason), then the referral payout will not be processed. If it has already been paid, it will
                        be adjusted or deducted from the next payout.
                    </li>
                    <li class="mb-2">
                        Customer Referral payouts are processed via third-party payment gateways. If a payout is delayed due
                        to a gateway issue, it will only be released once the gateway releases the payment. Bank-related
                        payout disputes will follow the concerned bank’s policies and timeline.
                    </li>
                    <li class="mb-2">
                        If any dispute arises between a user (customer, referral, etc.) and the company, their account will
                        be deactivated immediately. The user must then contact the company to resolve the matter.
                    </li>
                    <li class="mb-2">
                        All promotional content by Kaushal Corporate—on the website or elsewhere—is strictly for marketing
                        purposes. None of it should be interpreted as a guaranteed loan offer. Final loan approvals depend
                        on bank policies and the applicant's profile.
                    </li>
                    <li class="mb-2">
                        Any figures or loan details shown in promotions (loan amount, tenure, interest, etc.) are
                        indicative. The final terms depend solely on the bank’s evaluation of the customer’s profile and the
                        bank’s policies.
                    </li>
                    <li class="mb-2">
                        The company name, logo, software, website design, loan offers, business model, and processes are
                        legally copyrighted. Any unauthorized use or imitation, even partially, will lead to legal action.
                    </li>
                    <li class="mb-2">
                        Any person involved with the company (customer, referral, employee, etc.) consents to the company
                        recording phone calls for monitoring and verification purposes.
                    </li>
                    <li class="mb-2">
                        If a customer is defrauded by an external party during or after applying for a loan with Kaushal
                        Corporate, the company is not liable for any loss caused by that third party.
                    </li>
                    <li class="mb-2">
                        The loan offer given to the customer is based on their profile. Once offered, the customer is
                        required to accept the loan offer—they cannot deny it after application and offer generation.
                    </li>
                    <li class="mb-2">
                        The company has full authority to use the customer’s information for purposes such as testimonials,
                        advertisements, marketing, SMS, etc. The customer agrees that Do Not Disturb (DND) or National Do
                        Not Call (NDNC) regulations will not apply in such cases.
                    </li>
                    <li class="mb-2">
                        Any activity performed by a visitor on our website—such as clicking a button, filling a form, or
                        navigating the site—constitutes an agreement to all terms & conditions, rules, and policies of the
                        company.
                    </li>
                    <li class="mb-2">
                        After loan approval, all applicable bank charges will be levied according to the bank’s rules and
                        regulations.
                    </li>
                    <li class="mb-2">
                        No customer is permitted to directly contact employees of the bank regarding their loan file or
                        approval status.
                    </li>
                    <li class="mb-2">
                        Customers must carefully read and understand the bank’s loan agreement and terms before proceeding.
                        The company will not be held liable for any concerns arising after the completion of the loan
                        process.
                    </li>
                    <li class="mb-2">
                        The company will take legal action against any customer, reference person, or party who submits
                        fraudulent or fake documents. The company bears no responsibility for the loan process in such
                        cases.
                    </li>
                    <li class="mb-2">
                        Logos of partnered banks may appear on our website and promotional material for marketing purposes
                        only. Their presence does not imply direct partnerships or bank endorsements.
                    </li>
                    <li class="mb-2">
                        If any legal action is taken against the company, only the company’s legal advisor will respond, and
                        all legal matters will fall under the jurisdiction of Dewas, Madhya Pradesh. No individual may directly
                        contact employees or directors of the company.
                    </li>
                    <li class="mb-2">
                        Any false, misleading, or verbal commitment by company staff that is not documented or officially
                        stated shall be considered invalid. Only the company’s documented Terms & Conditions, Privacy
                        Policy, and other official rules will apply.
                    </li>
                    <li class="mb-2">
                        If anyone has any confusion, doubts, or questions about the company’s terms and conditions, they are
                        encouraged to contact the company directly.
                    </li>
                    <li class="mb-2">
                        The office holidays and bank holidays will not be counted as working days/business days. The
                        company’s office work will be done on working days only.
                    </li>
                    <li class="mb-2">
                        Loan processing time might get delayed because of any public holiday, technical problems, customer
                        issues, etc.
                    </li>
                    <li class="mb-2">
                        The Company will not be providing any proof for rejection in hard or soft copy.
                    </li>
                    <li class="mb-2">
                        It might be possible that the content/figures/information shown on our website are not updated. For
                        exact details, customers are advised to call our customer care number.
                    </li>
                    <li class="mb-2">
                        After the purchase of the Membership Card, the Company Executive will contact the concerned person
                        within 24–48 hours (may be delayed). If not contacted, the customer may call the company's customer
                        care number.
                    </li>
                    <li class="mb-2">
                        If there is no response from the login department during the process, the customer can reach out to
                        the customer care number.
                    </li>
                    <li class="mb-2">
                        Content or process on the website may be changed or updated at any time. Only the current content is
                        considered valid; older content will not be valid or accepted in any dispute.
                    </li>
                    <li class="mb-2">
                        By accessing our website, you confirm that you are at least 18 years old. Users below 18 are advised
                        not to access the website or services.
                    </li>
                    <li class="mb-2">
                        Loan processing may be delayed due to public holidays, technical/software issues, or
                        customer-related delays.
                    </li>
                    <li class="mb-2">
                        In case of delays in email/message updates due to technical issues, customers may call the customer
                        care number between 10 AM and 5 PM (Monday to Saturday).
                    </li>
                    <li class="mb-2">
                        For any queries or disputes, users may raise a ticket or call the company’s customer care during
                        working hours.
                    </li>
                    <li class="mb-2">
                        Due to software/system issues, loan status dates might be delayed by 3–4 days.
                    </li>
                    <li class="mb-2">
                        For TDS Returns, the reference customer must submit all required details in their portal. TDS Return
                        is applicable only for the financial year in which documents were submitted.
                    </li>
                    <li class="mb-2">
                        Personal loan eligibility for salaried individuals: Min. Age: 21 years, Min. Salary ₹15,000/month
                        (credited in bank), Salary slips, and Job stability proof. Final approval depends on customer
                        profile and bank criteria.
                    </li>
                    <li class="mb-2">
                        Personal loan eligibility for self-employed individuals: Min. Age: 21 years, IT returns for at least
                        1 year, Business stability proof, and a current account. Final approval depends on customer profile
                        and bank criteria.
                    </li>
                    <li class="mb-2">
                        Business loan eligibility for small business owners: Min. Age: 21 years, IT returns for at least 1
                        year, Business stability proof (min. 1 year). Final approval depends on customer profile and bank
                        criteria.
                    </li>
                    <li class="mb-2">
                        Business loan eligibility for audited businesses: Min. Age: 21 years, Yearly turnover above ₹1
                        crore, and Audited reports for 2 years. Final approval depends on customer profile and bank
                        criteria.
                    </li>
                    <li class="mb-2">
                        Membership eligibility age: 18 to 62 years. Only persons within this age bracket can avail
                        Membership benefits. Final loan approval is based on the customer’s profile and bank’s criteria.
                    </li>
                    <li class="mb-2">
                        Reference Customers must submit their payout documents within 30 days. Failing which, all payouts
                        will be cancelled automatically. Contact the company to discuss reinstating cancelled payouts.
                    </li>
                    <li class="mb-2">
                        Any content shown in promotional videos on social media or elsewhere may be outdated. Only the
                        current content, policies, and flow available on the website are valid.
                    </li>
                    <li class="mb-2">
                        The banks’ logos used in our ads, social media posts, blogs, emails, or any other medium are for
                        promotional purposes only. The loan process will proceed only with the bank where the customer’s
                        profile matches the eligibility criteria. Final approval depends on the bank’s rules and the
                        customer's profile.
                    </li>
                    <li class="mb-2">
                        The banks’ logos and pre-approved offers displayed on our website are tentative. The loan process
                        will only be done with the bank/NBFC matching the customer’s profile. Final loan approval depends on
                        that bank’s internal criteria.
                    </li>
                    <li class="mb-2">
                        By purchasing the company’s Membership Card, the customer agrees to avail the services of the
                        company and is eligible for the Membership benefits provided.
                    </li>
                    <li class="mb-2">
                        If any customer data, KYC documents, or OTP is misused by a third party, the company, its directors,
                        or employees shall not be held responsible in any manner. The customer is advised to exercise
                        discretion while sharing data.
                    </li>
                    <li class="mb-2">
                        If a bank/financial institution finds customer documents to be fake or if the customer defaults on
                        repayment, the matter will be between the customer and the bank. The company will not bear any
                        responsibility in such cases.
                    </li>
                    <li class="mb-2">
                        If any third-party obtains a loan using someone else’s documents or identity, the company and its
                        team will not be held liable.
                    </li>
                    <li class="mb-2">
                        Legal action against the company will involve only the company’s legal team. No employee, director,
                        or associated individual will participate. Dewas, Madhya Pradesh will be the only jurisdiction for all
                        legal proceedings.
                    </li>
                    <li class="mb-2">
                        TDS will be issued only to those whose referral payouts are generated. If TDS has been deducted but
                        is not reflecting, customers may contact the company or consult their CA.
                    </li>
                    <li class="mb-2">
                        If any person enters false/inaccurate information on the website and fraud occurs, the company and
                        its team shall not be held liable.
                    </li>
                    <li class="mb-2">
                        Pre-approved loan offers shown on the website are based on customer-entered data and are indicative.
                        The final approval is at the discretion of the partnered NBFC/bank after profile verification.
                    </li>
                    <li class="mb-2">
                        Company services are only for Indian residents. If a non-resident purchases a Membership Card, they
                        may request a refund as per the Cancellation & Refund Policy.
                    </li>
                    <li class="mb-2">
                        If a customer makes multiple payments by mistake, they may request a refund within 48 hours by using
                        the Raise A Request feature or contacting customer care.
                    </li>
                    <li class="mb-2">
                        If a customer purchases Memberships or Subscriptions from multiple companies under the same business
                        group, they may request a refund within 48 hours through the Raise A Request section or by calling
                        customer care.
                    </li>
                </ol>

                <h4 class="mb-3">PRE-APPROVAL LOAN OFFER TERMS AND CONDITIONS</h4>

                <p class="mb-3">
                    The Pre-Approved Loan Offer and the amount shown are generated purely based on the details provided by
                    the user, specifically the Monthly Income and Current Monthly EMI. These calculations are made by our
                    internal software and are indicative only.
                </p>

                <p class="mb-3">
                    This "Pre-Approved Loan Offer" is strictly tentative and <strong>does not constitute final loan
                        approval</strong>. Final loan approval is determined solely by the bank or NBFC, based on its
                    internal rules, regulations, and assessment of the customer's actual profile. This is also clearly
                    mentioned on the Pre-Approved Loan Offer page and is covered under the company’s Terms & Conditions –
                    which all users agree to before proceeding with registration.
                </p>

                <p class="mb-3">
                    <strong>Example for better understanding:</strong>
                </p>

                <ol class="mb-3">
                    <li class="mb-2">Assume a person named <strong>Sam</strong> enters the following details:
                        <ol class="mb-2">
                            <li>Monthly Income: ₹1,00,000</li>
                            <li>Current Monthly EMI: ₹30,000</li>
                        </ol>
                    </li>
                    <li class="mb-2">Based on these inputs, the system calculates Sam's net monthly disposable income as
                        ₹70,000 (₹1,00,000 - ₹30,000).</li>
                    <li class="mb-2">As per standard banking norms, an EMI up to 50% of disposable income (i.e. ₹35,000)
                        may be considered for approval.</li>
                    <li class="mb-2">Using an estimated interest rate of 11%, the software estimates the eligible loan
                        amount based on ₹35,000 EMI.</li>
                    <li class="mb-2">Accordingly, a per-lakh EMI of ₹1,093 is used to calculate and display the
                        Pre-Approved Loan Offer amount.</li>
                </ol>

                <p class="mb-3">
                    Please note: This is only an estimation to provide you with a possible loan range. The final loan
                    amount, interest rate, tenure, and disbursement decision will rest solely with the partnered bank or
                    NBFC after verifying all submitted documents and performing internal checks.
                </p>
                <h4 class="mb-3">CANDIDATE TERMS AND CONDITIONS</h4>

                <ul class="mb-3">
                    <li class="mb-2">The interview schedule provided by the company is fixed and final.</li>
                    <li class="mb-2">Interviews will only be conducted at the time decided by the company. No
                        rescheduling requests will be entertained.</li>
                    <li class="mb-2">The company reserves the right to ask any relevant questions during the interview
                        process.</li>
                    <li class="mb-2">The candidate must appear for the interview as many times as required or requested
                        by the company.</li>
                    <li class="mb-2">Submission of a printed (Xerox) copy of the resume is mandatory at the time of the
                        interview.</li>
                    <li class="mb-2">The submitted resume will not be returned to the candidate. However, the company
                        assures that it will not be misused under any circumstances.</li>
                </ul>
                <h4 class="mb-3">USAGE OF COOKIES / COOKIES POLICY</h4>

                <p class="mb-3">
                    Cookies are small files that a website or its service provider stores on your device’s hard drive
                    through your web browser (with your permission). These cookies allow the site or service provider’s
                    systems to recognize your browser and retain certain information.
                </p>

                <p class="mb-3">
                    We use cookies to enhance your browsing experience by remembering your preferences for future visits,
                    tracking advertisements, and compiling aggregated data about website traffic and interactions. This
                    helps us improve our site functionality and deliver better services and tools.
                </p>

                <p class="mb-3">
                    By accessing and using our website, every user, customer, or visitor explicitly agrees that they have
                    read, understood, and accepted the Terms & Conditions and Privacy Policy of Kaushal Corporate without
                    any objection.
                </p>
            </div>
        </div>
    </section>
    <!-- End T&C Content -->
@endsection
