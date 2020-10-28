let sendGoogleAnalytics = function(state, {category, eventAction, eventLabel, eventValue}) {
    window.ga('send', 'event', category, eventAction, eventLabel, eventValue);
    console.warn('ga event', category, eventAction, eventLabel, eventValue);
}

export {sendGoogleAnalytics};
