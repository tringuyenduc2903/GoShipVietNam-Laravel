# Changelog

All notable changes to `GoShipVietNam-Laravel` will be documented in this file.

## Release v1.0.2 - GoShip SDK for Laravel - 2025-08-29

This release introduces several improvements to the GoShipVietNam-Laravel SDK, focusing on enhancing webhook verification and API configuration for better reliability and simplicity. These updates ensure smoother integration with the GoShip API for Vietnam-based logistics and shipping services.

### Key Changes

- **Improved Webhook Verification**: Updated the `verifyWebhook` method to use `request()->all()` instead of `request()->getContent()` for more reliable payload handling. Additionally, fixed the hash calculation order to ensure accurate webhook verification.
- **Simplified API URL Configuration**: Removed the `/api/v2` suffix from the API URL in the source code, configuration files, and documentation, making the setup more straightforward for both sandbox and production environments.
- **Enhanced Documentation**: Updated the README and configuration files to reflect the simplified API URL structure, improving clarity for developers.

This version builds on the stability and usability introduced in v1.0.1, ensuring a more robust and developer-friendly experience for managing shipments, customers, and on-demand delivery services within Laravel applications.

## Release v1.0.1 - GoShip SDK for Laravel - 2025-08-16

This release introduces minor updates and bug fixes to the GoShip SDK for Laravel, enhancing stability and usability for Vietnam-specific shipping integrations. Key improvements include refined API request handling, updated documentation for clarity, and minor performance optimizations. This version ensures better compatibility with the GoShip API and improves developer experience for managing shipments, customers, and on-demand services within Laravel applications.

## Initial Release of GoShipVietNam-Laravel SDK - 2025-08-16

We are excited to announce the first official release of the **GoShipVietNam-Laravel SDK (v1.0.0)**, designed to integrate seamlessly with the Laravel framework for interacting with the GoShip API, tailored specifically for Vietnam-based logistics and shipping services. This release provides a robust set of tools to manage customers, shipments, rates, invoices, transactions, and on-demand delivery services, streamlining e-commerce and logistics workflows.

### Key Features

- **Easy Installation**: Install via Composer and publish configuration files effortlessly.
- **Authentication**: Supports login with JWT, username, password, client ID, and client secret.
- **Location Management**: Retrieve cities, districts, and wards for precise address handling.
- **Customer Management**: Create, update, delete, and search customers with ease.
- **Shipment Operations**: Calculate shipping rates, create, update, search, and delete shipments.
- **On-Demand Delivery**: Support for on-demand shipment creation, updates, and rate calculations with carriers like Ahamove and GrabExpress.
- **Invoice and Transaction Management**: Retrieve and search invoices and transactions for better financial tracking.
- **Webhook Verification**: Validate webhook payloads with a boolean response for secure integration.
