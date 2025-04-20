function stringToLinkDetection(plainText, truncate) {
    if (typeof plainText !== 'string') plainText = '';

    const urlRegex = /(https?:\/\/[^\s]+)/g;

    return plainText.replace(urlRegex, (url) => {
        let displayUrl = url;

        if (truncate === 'domain') {
            try {
                const { hostname } = new URL(url);
                displayUrl = hostname;
            } catch (e) {
                displayUrl = url;
            }
        } else if (typeof truncate === 'number') {
            if (truncate > 0 && url.length > truncate) {
                displayUrl = url.slice(0, truncate) + '...';
            }
        }

        return `<a href="${url}" target="_blank" rel="noopener noreferrer">${displayUrl}</a>`;
    });
}
