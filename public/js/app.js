
// New IndexedDB database
const dbName = "OrderProcessDB";
const dbVersion = 1;
const request = indexedDB.open(dbName, dbVersion);

request.onerror = function(event) {
    console.error("Error opening IndexedDB:", event.target.errorCode);
};

request.onupgradeneeded = function(event) {
    const db = event.target.result;

    // Create an object store (like a table in relational databases)
    const objectStore = db.createObjectStore("formData", { keyPath: "id", autoIncrement:true });

    // Define object store's schema (fields)
    objectStore.createIndex("customer_name", "customer_name", { unique: false });
    objectStore.createIndex("order_value", "order_value", { unique: false });
    objectStore.createIndex("order_date", "order_date", { unique: false });
};

request.onsuccess = function(event) {
    const db = event.target.result;

    // Handle form submission
    const form = document.getElementById("orderForm");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = {
            customer_name: form.customer_name.value,
            order_value: form.order_value.value,
            order_date: form.order_date.value
        };

        // Store data in IndexedDB
        const transaction = db.transaction(["formData"], "readwrite");
        const objectStore = transaction.objectStore("formData");
        const request = objectStore.add(formData);

        request.onsuccess = function(event) {
            console.log("OrderForm data added to IndexedDB");
            form.reset(); // Reset the form after submission
        };

        request.onerror = function(event) {
            console.error("Error adding form data:", event.target.error);
        };
    });
};