// Count the files inside a folder node
export const countFiles = (node) =>
    node.kids ? node.kids.reduce((sum, k) => sum + countFiles(k), 0) : 1;

// True when a node (or anything inside it) matches the filter text
export const hasMatch = (node, files, q) => {
    if (!q) return true;
    if (node.kids) return node.kids.some((k) => hasMatch(k, files, q));
    return files[node.id].title.toLowerCase().includes(q);
};

// Path of folder names + file title, e.g. ['projects', 'branding', 'oro-coffee.brand']
export const pathOf = (id, nodes, files, trail = []) => {
    for (const n of nodes) {
        if (n.id === id) return [...trail, files[id].title];
        if (n.kids) {
            const found = pathOf(id, n.kids, files, [...trail, n.name]);
            if (found) return found;
        }
    }
    return null;
};

// Open every folder that appears in the path
export const expandTo = (nodes, path) => {
    nodes.forEach((n) => {
        if (n.kids && path.includes(n.name)) {
            n.open = true;
            expandTo(n.kids, path);
        }
    });
};
