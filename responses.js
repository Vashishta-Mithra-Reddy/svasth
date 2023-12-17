function getBotResponse(input) {
    //rock paper scissors
    if (input == "Hi") {
        return "How can I help you?";
    } else if (input == "beds") {
        return "For enquiries, please contact 999999";
    } else if (input == "availability") {
        return "For enquiries, please contact 999999";
    }else if (input == "billing") {
        return "For billing and payment-related questions, please check out the dashboard";
    }
    else if (input == "timings") {
        return "Our general working hours are from 10 AM to 8 PM. Please check with the specific ward for any additional restrictions.";
    }else if (input == "pharmacy") {
        return "Our hospital has an in-house pharmacy. You can purchase prescribed medications directly from there.";
    }
    else if (input == "appointment") {
        return "For appointment scheduling,please contact 999999 or book in the portal.";
    }
    else if (input == "visiting") {
        return "Our general visiting hours are from 10 AM to 8 PM. Please check with the specific ward for any additional restrictions.";
    }
    else if (input == "pharmacy") {
        return "Our hospital has an in-house pharmacy. You can purchase prescribed medications directly from there.";
    }

    // Simple responses
    

    if (input == "reports") {
        return "For reports, please login and check the dashboard";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else {
        return "Try asking something else!";
    }

   
}