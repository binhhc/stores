<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    "js" => array(
        "store" => array(
            "commission" => "The :attribute must be accepted.",
            "top" => array(
                "back" => "Back to Top"
            ),
            "show" => array(
                "tax" => "\u203bTax included",
                "download" => "\u203bThis is digital item",
                "freeShipping"=> "Miễn phí vận chuyển",
                "orderFee" => "\u203bShipping cost not included",
                "orderFee2" => "JPY per order",
                "freeOrder" => "Shipping of order of ",
                "freeOrder2" => "JPY or more is free",
                "quantity" => "Quantity:",
                "addCart" => "Thêm vào giỏ hàng",
                "back" => "Trở về trang chủ",
                "tweet" => "Tweet",
                "share" => "Share",
                "shippingFee" => array(
                    "cost" => "Shipping Cost",
                    "other" => "Other Countries",
                    "yen" =>  "JPY",
                    "balloon1" => "Free Shipping Over",
                    "balloon2" => "",
                    "hear1" => "Shipping Cost ",
                    "hear2" => "Chart",
                    "hear3" => ""
                ),
                "restockPopup" => array(
                    "explanation" => "We will e-mail you when we restock this item.",
                    "invalid_email" => "E-mail address",
                    "restock_exists" => "This e-mail has already been recorded.",
                    "restock_error" => "You can't register this e-mail address.",
                    "submit" => "Submit",
                    "sending" => "Sending",
                    "request_complete" => "Your request has completed.",
                    "send_mail" => "E-mail has send to your address. If you have not got e-mail from us, please try again.",
                    "caution" => "E-mail will not send if we do not have any more stock."
                ),
                "review" => array(
                    "review" => "Review"
                )
            ),
            "cart" => array(
                "title" => "Shopping Cart",
                "item" => "Item",
                "price" => "Price",
                "quantity" => "Quantity",
                "category" => "Category",
                "total" => "Total",
                "shippingFee" => "Shipping fee",
                "subtotal" => "Subtotal",
                "check" => "Checkout",
                "continue" => "Continue Shopping"
            ),
            "inquiry" => array(
                "title" => "Contact Form",
                "nameInfo" => "Name",
                "firstName" => "first",
                "lastName" => "last",
                "email" => "Email Address",
                "question" => "Inquiry",
                "send" => "Send",
                "checkout" => "Order",
                "sending" => "Sending",
                "cancel" => "Cancel",
                "done" => "Your message has been received."
            ),
            "tokushoho" => array(
                "title" => "Terms & Conditions",
                "price" => "<Price>",
                "payment" => "<Payment>",
                "returning" => "<Return Policy>",
                "merchandise" => "<Delivery>",
                "contact" => "<Contact>",
                "buttonTokushoho" => "About",
                "buttonTerms" => "Terms of Service",
                "buttonPrivacyPolicy" => "Privacy Policy"
            ),
            "terms" => array(
                "title" => "Terms & Conditions",
                "buttonTokushoho" => "About",
                "buttonTerms" => "Terms of Service",
                "buttonPrivacyPolicy" => "Privacy Policy"
            ),
            "privacyPolicy" => array(
                "title" => "Terms & Conditions",
                "buttonTokushoho" => "About",
                "buttonTerms" => "Terms of Service",
                "buttonPrivacyPolicy" => "Privacy Policy"
            ),
            "checkout" => array(
                "coupon" => "Coupon",
                "couponCode" => "Coupon Code",
                "couponCodeErr" => "Coupon Code is incorrect",
                "couponUse" => "Adapt",
                "receiverAddress" => "Billing Address",
                "shippingAddress" => "Shipping Address",
                "nameInfo" => "Name",
                "firstName" => "first",
                "lastName" => "last",
                "postalCode" => "Postal code",
                "postalCodeWarning" => "",
                "address" => "Address",
                "tel" => "Phone Number",
                "tel_warning" => "\u203bPlease fill the box if necessary",
                "country" => "Country",
                "email" => "Email Address",
                "email2" => "Re-enter email address",
                "emailWarning" => "",
                "emailConfirm" => "",
                "notes" => "Comments",
                "notesWarning" => "\u203bPlease fill it out if necessary",
                "sameAddress" => "Ship to billing address",
                "thanks" => "Thank you for your purchase",
                "confirmMailAlert1" => "We'll send the [Purchase Confirmation] to your e-mail address soon.",
                "confirmMailAlert2" => "If you can't get the e-mail, please contact us from the inquiry form.",
                "credit" => array(
                    "title" => "Payment",
                    "type" => "Card Type",
                    "typeDescription1" => "Offers a credit card here",
                    "num" => "Card Number",
                    "holder" => "Card Holder",
                    "until" => "Valid Until",
                    "cardId" => "Card ID Number",
                    "preview" => "Next",
                    "cancel" => "Cancel",
                    "back" => "Back",
                    "example" => "ex",
                    "month" => "Month",
                    "year" => "year",
                    "security_code" => "\u203bThree-four digit value printed on the signature strip on the back."
                ),
                "receiveMehtod" => array(
                    "title" => "Receive Method"
                ),
                "optional" => "Optional",
                "input" => "Input",
                "confirm" => "Confirm",
                "complete" => "Complete",
                "confirmEmail" => "\u203bPlease confirm once again whether it is wrong.",
                "exampleAddress" => "ex) Kokusai101kan Bld.2F,1-20-15,Jinnan,Shibuya-ku",
                "termsOfService" => "Terms of Service",
                "privacyPolicy" => "Privacy Policy"
            ),
            "download" => array(
                "download" => "Download"
            ),
            "error" => array(
                "name" => "Please enter the Name",
                "postalCode" => "Please enter the Postal Code",
                "address" => "Please enter the Address",
                "tel" => "Please enter the numbers without a hyphen",
                "email" => "Please fill in a valid email address",
                "notes" => "Please fill in less than 2000 characters",
                "credit" => array(
                    "type" => "Please select a card type",
                    "num" => "Please enter the card number",
                    "holder" => "Please enter the card name",
                    "cardId" => "Please enter the Card ID Number",
                    "checkout" => "Failed to credit card settlement"
                ),
                "bank_transfer" => array(
                    "checkout" => "Failed to bank transfer settlement"
                ),
                "convenience_store_payment" => array(
                    "checkout" => "Failed to convenience store settlement"
                ),
                "question" => "Please enter the question",
                "checkout" => "Failed to order",
                "emailUnmach" => ""
            ),
            "secret" => array(
                "title1" => "This page is protected.",
                "title2" => "Please enter a password.",
                "password" => "Password",
                "password_mobile" => "Password",
                "empty" => "Please enter a password.",
                "error" => "incorrect password"
            ),
            "news" => array(
                "back" => "News List"
            ),
            "r18" => array(
                "title" => "Age-Verification",
                "r18_description1" => "This page contains adult contents.",
                "r18_description2" => "We will refuse the access of less than 18 years old.",
                "r18_description3" => "Are you older than 18 years old?",
                "r20_description1" => "We are selling alcohol.",
                "r20_description2" => "In Japan, the legal age for a person to be able to drink alcohol begins at 20.",
                "r20_description3" => "Are you older than 20 years old?",
                "accept" => "Yes",
                "reject" => "No"
            ),
            "review" => array(
                "write" => "Write your review for this item.",
                "rate" => "Rate",
                "nickname" => "Nickname",
                "nickname_error" => "Enter your nickname",
                "comment" => "Comment",
                "notes" => "Please enter your review within 1000 characters.",
                "submit" => "Submit"
            )
        ),
        "download" => array(
            "result" => array(
                "confirmEmail" => "Please enter your e-mail address that you entered when you buy",
                "notes" => "Download page transition",
                "next" => "Next",
                "thanks" => "Thank you for your purchase",
                "return" => "Has been refunded"
            ),
            "error" => array(
                "email" => "Please fill in a valid email address",
                "email2" => "It is not correctly"
            )
        ),
        "nonSelect" => "Please select",
        "paymentMethods" => array(
            "credit" => "Credit Card"
        ),
        "receiveMehtods" => array(
            "store" => "Recieve Store",
            "shipping_address" => "Shipping Address"
        ),
        "follow" => array(
            "credit_card" => array(
                "use_registered" => "Use registered credit card informaion",
                "use_other" => "Use other credit card",
                "registered" => "Registered credit card",
                "save" => "Save this credit card information"
            ),
            "member" => array(
                "registration" => "Membership registration",
                "aggree_terms_html" => 'Agree to the <a href="#!/terms">terms</a> & conditions',
                "registration_note_html1" => "If you register to the membership,<br>you will not need to fill-in address and payment information from your next purchase.",
                "registration_note_html2" => '*Your membership ID will be able to use at all of the stores powered by <a href="https://store.jp" target="_blank">STORES.jp</a>',
                "password" => "Password",
                "error" => array(
                    "registration_failed" => "Your memberhip registration has failed",
                    "already_email" => "This e-mail address has already been used",
                    "try_html" => 'Please try your membership registration again from <a href="/signup">here</a>.',
                    "password" => array(
                        "min_length" => "Please enter a password of 6 or more characters"
                    )
                )
            )
        )
    )
);
